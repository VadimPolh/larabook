<?php

use Larabook\Forms\RegistrationForm;
use Larabook\Registration\RegisterUserCommand;


class RegistrationController extends BaseController {



    private $registrationForm;



    function __construct(RegistrationForm $registrationForm){
        $this->registrationForm = $registrationForm;
        $this->beforeFilter('guest');
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


        $user = $this->execute(RegisterUserCommand::class);

        Auth::login($user);

        Flash::overlay('Glad to have you as a new Larabook member!');

        return Redirect::home();
    }


}
