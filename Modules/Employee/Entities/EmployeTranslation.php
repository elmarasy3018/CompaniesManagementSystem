<?php

namespace Modules\Employee\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'full_text'];
    public $timestamps = false;
}
