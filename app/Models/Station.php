<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $fillable = ['user_id', 'name', 'phone'];

    public function user() {

        return $this->belongsTo(User::class);
    }

    public function clients() {

        return $this->hasMany(Client::class);
    }

    public function messages() {

        return $this->belongsToMany(Message::class);
    }
}
