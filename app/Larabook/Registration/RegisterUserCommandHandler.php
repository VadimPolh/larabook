<?php


namespace Larabook\Registration;


use Laracasts\Commander\CommandHandler;

class RegisterUserCommandHandler implements CommandHandler{

    public function handle($command){
        $user = User::register(
          $command->username, $command->email, $command->password
        );
        return $user;
    }

}