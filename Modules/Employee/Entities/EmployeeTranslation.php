<?php

namespace Modules\Employee\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name'];
    public $timestamps = false;
}
