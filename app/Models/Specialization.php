<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Specialization extends Model
{
    use HasTranslations;
    protected $guarded = [];

    public $translatable = ['name'];

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}
