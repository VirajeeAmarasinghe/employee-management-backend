<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'emp_no';
    protected $fillable = ['birth_date', 'first_name', 'last_name', 'gender', 'hire_date'];
    public $incrementing = false;

    public function salaries()
    {
        return $this->hasMany(Salary::class, 'emp_no');
    }

    public function titles()
    {
        return $this->hasMany(Title::class, 'emp_no');
    }
}
