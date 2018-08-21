<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table = "scores";

    protected $fillable = [
        'gameId', 'score', 'scorer'
    ];

    public $timestamps = true;

    public function game() {
        return $this->belongsTo('App\Models\Game');
    }
}
