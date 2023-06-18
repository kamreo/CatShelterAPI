<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatShelter extends Model
{
    protected $fillable = ['name', 'address'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function cats()
    {
        return $this->hasMany(Cat::class);
    }
}
