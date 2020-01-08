<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table='attendances';

    protected $fillable=['employee_id','timein','timeout','date','status','created_by','updated_by'];

//    public function salaries()
//    {
//        return $this->hasMany(Salary::class);
//    }
//    public function cashadvances()
//    {
//        return $this->hasMany(CashAdvance::class);
//    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
