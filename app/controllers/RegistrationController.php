<?php

use Larabook\Forms\RegistrationForm;
use Larabook\Registration\RegisterUserCommand;
use Laracasts\Commander\CommandBus;

class RegistrationController extends \BaseController {
    private $registrationForm;
    private $commandBus;

    function __construct(CommandBus $commandBus, RegistrationForm $registrationForm){
        $this->commandBus = $commandBus;
        $this->registrationForm = $registrationForm;
    }

    /**
	 * Show the form for register a user
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
	}

    /*
     * Create a new Larabook user
     *
     * @return string
     */
    public function store(){

        $this->registrationForm->validate(Input::all());

        extract(Input::only('username','email','password'));

        $user = $this->commandBus->execute(
            new RegisterUserCommand($email,$password,$username)
        );

        Auth::login($user);

        return Redirect::home();
    }


}
