<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    //relasi ke user
    public function user(){
    	return $this->belongsTo('App\User');
    }

    //relasi 1 to many ke kebun
    public function kebun(){
    	return $this->hasMany('App\Kebun');
    }

    //relasi ke divisi
    public function divisi(){
    	return $this->hasMany('App\Divisi');
    }

    //relasi 1 to many ke blok
    public function blok(){
    	return $this->hasMany('App\Blok');
    }


    //relasi 1 to many ke reportlist
    public function reportList(){
        return $this->hasMany('App\ReportList');
    }

    public function reporShow(){
        return $this->hasMany('App\ReportShow');
    }

}
