<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\City;

class District extends Model
{
    public function city(){
        return $this->belongsTo(City::class);
    }
}
