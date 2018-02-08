<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Battle extends Model
{

	protected $fillable = [
		'status'
	];


	public function circle(){
		return $this->belongsTo('App\Cicle' );
	}


	public function participants( ){
		return $this->belongsToMany( 'App\Participant', 'battles_participants', 'battle_id', 'participant_id');
	}

	public function winners( ){
		return $this->belongsToMany( 'App\Participant', 'battles_winners', 'battle_id', 'participant_id');
	}
}
