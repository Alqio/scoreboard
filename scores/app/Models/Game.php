<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

    protected $table = 'games';

    protected $fillable = [
        'name', 'slug', 'owner'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getRouteKey()
    {
        return $this->slug;
    }

    public $timestamps = true;

    public function create($data) {
        $this->fill($data);
        $slug = str_slug($this->name, '-');

        $duplicates = Game::where('name', '=', $this->name)->count();
        if ($duplicates > 0) {
            $slug = $slug . "-" . $duplicates;
        }
        $this->slug = $slug;

        $this->save();
    }

    public function scores() {
        return $this->hasMany('\App\Models\Score');
    }
}
