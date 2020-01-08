<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{
    protected $table='deductions';

    protected $fillable=['employee_id','cashadvance_id','pagibig','philhealth','projectissues','sss','total_deduction','status','created_by','updated_by'];

    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }
    public function cashadvances()
    {
        return $this->hasMany(CashAdvance::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
