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
            'user_id' => $users[0]->id
        ]);

        TestDummy::times(2)->create('Larabook\Statuses\Status',[
            'user_id' => $users[1]->id
        ]);


        // Which i fetch statuses for one users

        $statusesForUser = $this->repo->getAllForUser($users[0]);


        //Then i should recive

        $this->assertCount(2,$statusesForUser);
    }

}