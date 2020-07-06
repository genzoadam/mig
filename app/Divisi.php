<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $table = 'divisis';

    //relasi ke kebun
    public function kebun(){
    	return $this->belongsTo('App\Kebun');
    }

    //relasi 1 to many ke blok
    public function blok(){
    	return $this->hasMany('App\Blok');
    }

    //relasi 1 to 1 ke comp
    public function company(){
    	return $this->belongsTo('App\Company');
    }

    public function reportShow(){
        return $this->hasMany('App\ReportShow');
    }
}
