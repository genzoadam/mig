<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blok extends Model
{
    protected $table = 'bloks';

    //relasi ke divisi
    public function divisi(){
    	return $this->belongsTo('App\Divisi');
    }
    //relasi ke company
    public function company(){
    	return $this->belongsTo('App\Company');
    }
}
