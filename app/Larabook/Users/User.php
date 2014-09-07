<?php namespace Larabook\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Eloquent, Hash;
use Larabook\Registration\Events\UserRegistered;
use Laracasts\Commander\Events\EventGenerator;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator;

	protected $fillable = ['username','email','password'];


    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    /**
     *Password would be like hashed
     *
     * @param $password
     */
    public function setPasswordAttribute($password){
        $this->attributes['password'] = Hash::make($password);
    }

    public static function register($username,$email,$password){

        $user = new static(compact('username','email','password'));

        $user->raise(new UserRegistered($user));

        return $user;

    }

}
