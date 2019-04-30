<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    //
    protected $fillable=[
            'name',
            'description',
            'company_id',
            'user_id',       ];

    public function users(){
        return $this->belongsTo('App\User');
    }
    public function company(){
        return $this->belongsTo('App\company');
    }
    public function comments(){
        return $this->morphMany('\App\comment','commentable');
    }


}
