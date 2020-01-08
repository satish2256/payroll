<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashAdvance extends Model
{
    protected $table='cashadvances';

    protected $fillable=['employee_id','date_advance','amount','status','created_by','updated_by'];

    public  function deduction(){
        return $this->belongsTo(Deduction::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
