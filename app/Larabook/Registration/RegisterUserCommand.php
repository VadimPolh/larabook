<?php namespace Larabook\Registration;


class RegisterUserCommand {
    public $username;
    public $email;
    public $password;


    function __construct($email,$password,$username){
        $this->email=$email;
        $this->password=$password;
        $this->username=$username;
    }
}