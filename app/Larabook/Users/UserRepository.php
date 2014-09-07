<?php namespace Larabook\Users;

use Larabook\Users\User;

class UserRepository {
    /**
     * @param User $user
     * @return bool
     */
    public function save(User $user){

        return $user->save();
    }
} 