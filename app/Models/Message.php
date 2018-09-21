<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $fillable = ['message'];

    public function stations() {

        return $this->belongsToMany(Station::class);
    }

    public function client() {

        return $this->belongsToMany(Client::class);
    }
}
