<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['station_id','phone'];

    public function station() {

        return $this->belongsTo(Station::class);
    }

    public function messages() {

        return $this->belongsToMany(Message::class);
    }
}
