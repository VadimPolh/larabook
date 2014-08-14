<?php

class RegistrationController extends \BaseController {

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
       $user = User::create(
            Input::only('username','email','password')
        );

        Auth::login($user);

        return Redirect::home();
    }


}
