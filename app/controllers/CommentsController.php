<?php

use Laracasts\Commander\CommanderTrait;
use Larabook\Statuses\LeaveCommentOnStatusCommand;

class CommentsController extends \BaseController {


    use CommanderTrait;

    /**
	 * Leave a new comment
	 * POST /comments
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = array_add(Input::get(),'user_id', Auth::id());

        $this->execute(LeaveCommentOnStatusCommand::class,$input);

        return Redirect::back();

	}



}