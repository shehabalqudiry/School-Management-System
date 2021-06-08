<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SParent extends Model
{
    use HasTranslations;
    public $translatable = ['name_father', 'job_father', 'name_mother', 'job_mother'];

    protected $table = 'sparents';
    protected $guarded = [];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
