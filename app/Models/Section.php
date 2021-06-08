<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasTranslations;
    protected $guarded = [];

    public $translatable = ['name'];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_section');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
