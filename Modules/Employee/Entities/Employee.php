<?php

namespace Modules\Employee\Entities;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Employee extends Model implements HasMedia, TranslatableContract
{
    use HasFactory, InteractsWithMedia, Translatable;

    protected $fillable = ['email', 'phone'];
    public $translatedAttributes = ['first_name', 'last_name'];

    public function companies()
    {
        return $this->belongsToMany(company::class);
    }

    protected static function newFactory()
    {
        return \Modules\Employee\Database\factories\EmployeeFactory::new();
    }
}
