<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kebun extends Model
{
    protected $table = 'kebuns';

    //relasi ke company
    public function company(){
    	return $this->belongsTo('App\Company');
    }

    //relasi 1 to many ke divisi
    public function divisi(){
    	return $this->hasMany('App\Divisi');
    }

    //relasi 1 to many ke reportlist
    public function reportList(){
        return $this->hasMany('App\ReportList');
    }

    public function reportShow(){
        return $this->hasMany('App\ReportShow');
    }
}
