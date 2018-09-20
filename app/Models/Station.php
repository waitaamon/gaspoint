<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Station extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'phone'];

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
