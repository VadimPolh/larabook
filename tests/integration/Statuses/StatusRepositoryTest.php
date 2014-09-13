<?php


use Larabook\Statuses\StatusRepository;
use Laracasts\TestDummy\Factory as TestDummy;

class StatusRepositoryTest extends \Codeception\TestCase\Test
{
   /**
    * @var \IntegrationTester
    */
    protected $tester;

    protected $repo;

    protected function _before()
    {

        $this->repo = new StatusRepository();
        //$this->tester->grabService('Larabook\Statuses\StatusRepository');

    }


    /** @test */
    public function it_gets_all_statuses_for_a_user()
    {

        //Given I have two users

        $users = TestDummy::times(2)->create('Larabook\Users\User');

        //And statuses for both of them

        TestDummy::times(2)->create('Larabook\Statuses\Status',[
            'user_id' => $users[0]->id,
            'body' => 'my status'
        ]);

        TestDummy::times(2)->create('Larabook\Statuses\Status',[
            'user_id' => $users[1]->id,
            'body' => 'his status'
        ]);


        // Which i fetch statuses for one users

        $statusesForUser = $this->repo->getAllForUser($users[0]);


        //Then i should recive

        $this->assertCount(2,$statusesForUser);
        $this->assertEquals('my status',$statusesForUser[0]->body);
        $this->assertEquals('my status',$statusesForUser[1]->body);
    }

    /** @test */

    public function it_saves_a_status_for_a_user()
    {
        // Given I have an unsaved status
        $status = TestDummy::build('Larabook\Statuses\Status', [
            'user_id' => null,
            'body' => 'My status'
        ]);

        // And an existing user
        $user = TestDummy::create('Larabook\Users\User');

        // When I try to persist this status
        $this->repo->save($status, $user->id);

        // Then it should be saved, and have the correct user_id
        $this->tester->seeRecord('statuses', [
            'body' => 'My status',
            'user_id' => $user->id
        ]);
    }

}