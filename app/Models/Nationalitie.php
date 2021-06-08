<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Nationalitie extends Model
{
    use HasTranslations;
    protected $guarded = [];

    public $translatable = ['name'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

}
