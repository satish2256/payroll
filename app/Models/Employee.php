<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table='employees';

    protected $fillable=['department_id','position_id','name','phone','address','email','username','password','gender','status','created_by','updated_by'];

    public  function department(){
        return $this->belongsTo(Department::class);
    }
    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }
    public  function position(){
        return $this->belongsTo(Position::class);
    }
    public function deductions()
    {
        return $this->hasMany(Deduction::class);
    }
    public  function cashadvanes(){
        return $this->hasMany(CashAdvance::class);
    }


}
