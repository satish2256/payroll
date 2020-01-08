<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable= ['name','email','password'];

    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }
}
