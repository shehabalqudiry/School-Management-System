<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Student extends Model
{
    use HasTranslations;
    public $translatable = ['name'];

    protected $guarded = [];

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function sparents()
    {
        return $this->belongsTo('App\Models\SParent', 'sparent_id');
    }

    public function nationality()
    {
        return $this->belongsTo('App\Models\Nationalitie', 'nationalitie_id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
