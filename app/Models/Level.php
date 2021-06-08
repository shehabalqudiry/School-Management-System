<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Level extends Model
{
    use HasTranslations;
    protected $guarded = [];

    public $translatable = ['name'];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
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
