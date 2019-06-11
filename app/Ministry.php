<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ministry extends Model
{
    protected $table = 'ministries';

    public function member(){
        return $this->belongsToMany(People::class,'ministry_members','ministry_id','people_id');
    }
    public function note(){
        return $this->hasMany(MinistryNote::class,'ministry_id');
    }
    public function event(){
        return $this->hasMany(MinistryEvent::class,'ministry_id');
    }
    public function delete()
    {
        $this->member()->detach();
        $this->note()->delete();
        $this->event()->delete();
        return parent::delete(); // TODO: Change the autogenerated stub
    }
}