<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    // From
    public function f_grade()
    {
        return $this->belongsTo(Grade::class, 'from_grade');
    }

    public function f_level()
    {
        return $this->belongsTo(Level::class, 'from_grade');
    }

    public function f_section()
    {
        return $this->belongsTo(Section::class, 'from_grade');
    }
    // To
    public function t_grade()
    {
        return $this->belongsTo(Grade::class, 'to_grade');
    }

    public function t_level()
    {
        return $this->belongsTo(Level::class, 'to_grade');
    }

    public function t_section()
    {
        return $this->belongsTo(Section::class, 'to_grade');
    }
}
