<?php namespace Larabook\Statuses;

use Larabook\Statuses\Events\StatusWasPublished;
use Laracasts\Commander\Events\EventGenerator;

class Status extends \Eloquent{

    use EventGenerator;

    protected $fillable = ['body'];

    public function User(){
        return $this->belongsTo('Larabook\Users\User');
    }

    public static function publish($body){
        $status = new static(compact('body'));
        $status->raise(new StatusWasPublished($body));

        return $status;
    }

}
 