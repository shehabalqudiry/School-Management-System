<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Grade extends Model
{
    use HasTranslations;
    protected $guarded = [];

    public $translatable = ['name'];

    public function levels()
    {
        return $this->hasMany(Level::class);
    }
    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
