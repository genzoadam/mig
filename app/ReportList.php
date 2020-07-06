<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportList extends Model
{
    protected $table = "report_lists";

    //many to many
    public function reportShow()
    {
    	return $this->belongsToMany('App\ReportShow');
    }

    public function company(){
    	return $this->belongsTo('App\Company');
    }

    public function kebun(){
    	return $this->belongsTo('App\Kebun');
    }
}
