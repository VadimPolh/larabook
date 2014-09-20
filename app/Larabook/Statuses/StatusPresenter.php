<?php namespace Larabook\Statuses;


use Laracasts\Presenter\Presenter;

class StatusPresenter extends Presenter {

    /**
     * Display how long is publish date
     *
     * @return mixed
     */
    public function timeSincePublished(){
        return $this->created_at->diffForHumans();
    }
} 