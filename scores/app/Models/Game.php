<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

    protected $table = 'games';

    protected $fillable = [
        'name', 'owner'
    ];

    public $timestamps = true;


    public function scores() {
        return $this->hasMany('App\Models\Score');
    }

}
