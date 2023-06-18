<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $fillable = ['name', 'age', 'cat_shelter_id'];

    public function catShelter()
    {
        return $this->belongsTo(CatShelter::class, 'cat_shelter_id');
    }
}
