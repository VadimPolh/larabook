<?php

use \Larabook\Forms\SignInForm;

class SessionsController extends \BaseController {


    /**
     * @param SignInForm $signInForm
     */
    function __construct(SignInForm $signInForm)
    {
        $this->beforeFilter('guest' , ['except'=>'destroy']);
        $this->signInForm = $signInForm;

    }



    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a sign In.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//fetch the form input
    $formData = Input::only('email','password');

    $this->signInForm->validate($formData);

     if (Auth::attempt($formData)){
         Flash::message('Welcome back!');
         return Redirect::intended('/statuses');
     };

	}


    public function destroy(){

        Auth::logout();

        Flash::message('You have now log out!');
        return Redirect::home();
    }



}
