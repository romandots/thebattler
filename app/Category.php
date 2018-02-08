<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	protected $fillable = [
		'title',
		'description',
		'closed_at',
		'event_id'
	];


	public function event( ){
		return $this->belongsTo('App\Event');
	}


	public function circles( ){
		return $this->hasMany('App\Circle');
	}

	public function participants( ){
		return $this->hasManyThrough('App\Participant', 'App\Battle');
	}

}
