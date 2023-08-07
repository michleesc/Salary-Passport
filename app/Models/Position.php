<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = ['name', 'salary'];
    
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}