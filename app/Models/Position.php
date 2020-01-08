<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table='positions';

    protected $fillable=['name','description','status','created_by','updated_by'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

}
