<?php namespace Larabook\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Eloquent, Hash;
use Larabook\Registration\Events\UserRegistered;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator, PresentableTrait;

	protected $fillable = ['username','email','password'];


    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

    /**
     * @var string
     */
    protected $presenter = 'Larabook\Users\UserPresenter';


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
    public function statuses(){
        return $this->hasMany('Larabook\Statuses\Status');
    }



    public function setPasswordAttribute($password){
    $this->attributes['password'] = Hash::make($password);
}

    public static function register($username,$email,$password){

        $user = new static(compact('username','email','password'));

        $user->raise(new UserRegistered($user));

        return $user;

    }

    public function gravatarLink(){
        $email = md5($this->email);

        return "//www.gravatar.com/avatar/{$email}?s=30";
    }

}
