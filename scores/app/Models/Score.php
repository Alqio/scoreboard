<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table = "scores";

    protected $fillable = [
        'game_id', 'score', 'scorer'
    ];

    public $timestamps = true;

    public function game() {
        return $this->belongsTo('App\Models\Game');
    }

    public function display() {
        return [
            'score' => $this->score,
            'player' => $this->scorer,
            'date' => date($this->updated_at)
        ];
    }

}
