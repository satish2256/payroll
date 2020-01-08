<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $table='salaries';

    protected $fillable=['medical_allowance','dearness_allowance','travelling_allowance','house_rent_allowance','bonus','basic','total_amount','employee_id','deduction_id','status','created_by','updated_by'];

    public  function employee(){
        return $this->belongsTo(Employee::class);
    }
    public  function deduction(){
        return $this->belongsTo(Deduction::class);
    }
}
