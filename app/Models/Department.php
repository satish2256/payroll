<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table='departments';

    protected $fillable=['name','email','phone','head_of_department','description','status','created_by','updated_by'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
