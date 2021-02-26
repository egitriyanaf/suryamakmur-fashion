<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Province;

class City extends Model
{
    public function province(){
        return $this->belongsTo(Province::class);
    }
}
