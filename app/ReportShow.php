<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportShow extends Model
{
    protected $table = "report_shows";

    //many to many
    public function reportList()
    {
    	return $this->belongsToMany('App\ReportList');
    }

    //relasi 1 to 1 ke bcmp
    public function company(){
    	return $this->belongsTo('App\Company');
    }

    public function kebun(){
    	return $this->belongsTo('App\Kebun');
    }

    public function divisi(){
    	return $this->belongsTo('App\Divisi');
    }

}
