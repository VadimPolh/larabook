<?php namespace Larabook\Users;


trait FollowableTrait {

    public function followedUser(){
        return $this->belongsToMany(static::class,'follows','follower_id','followed_id')->withTimestamps();
    }

    public function followers(){
        return $this->belongsToMany(static::class,'follows','followed_id','follower_id')->withTimestamps();
    }

    public function isFollowedBy(User $otherUser){

        $idsWhoOtherUserFollows = $otherUser->followedUser()->lists('followed_id');

        return in_array($this->id,$idsWhoOtherUserFollows);
    }
} 