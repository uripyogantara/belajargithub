<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id', 'schedule_id', 'status',
    ];

    public function schedule(){
    	return $this->belongsTo(Schedule::class);
    }
}
