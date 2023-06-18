<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'position', 'cat_shelter_id'];

    public function catShelter()
    {
        return $this->belongsTo(CatShelter::class);
    }
}
