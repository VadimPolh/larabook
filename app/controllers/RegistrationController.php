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
        return Redirect::home();
    }


}
