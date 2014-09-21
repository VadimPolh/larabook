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


    public function getPaginated($howMany = 25){
        return User::orderBy('username','asc')->simplePaginate($howMany);
    }

    public function findByUsername($username){
        return User::with(['statuses'=> function($query){
            $query->latest();
        }])->whereUsername($username)->first();
    }
} 