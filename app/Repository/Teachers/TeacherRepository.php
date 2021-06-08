<?php

namespace App\Repository\Teachers;

use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface
{

    // Get All Teachers
    public function getAllTeachers()
    {
        return Teacher::all();
    }

    // Get All Specialization
    public function GetSpecs()
    {
        return Specialization::all();
    }

    // Get All Genders
    public function GetGenders()
    {
        return Gender::all();
    }

    // Story Teacher ToDatabase
    public function StoryTeachers($req)
    {
        try {
            // $t Teacher Model
            $t = new Teacher();
            $t->email               = $req->email;
            $t->password            = Hash::make($req->password);
            $t->name                = ['ar' => $req->name, 'en' => $req->name_en];
            $t->specialization_id   = $req->specialization_id;
            $t->gender_id           = $req->gender_id;
            $t->joining_date        = $req->joining_date;
            $t->address             = $req->address;
            $t->save();

            toastr()->success(__('trans.Success_Add'));
            return redirect()->route('teachers.create');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error', $e->getMessage()]);
        };
    }

    public function EditTeachers($id)
    {
        return Teacher::findOrFail($id);
    }

    public function UpdateTeachers($req)
    {
        try {
            // $t Teacher Model
            $t = Teacher::findOrFail($req->id);
            $t->email               = $req->email;
            $t->password            = Hash::make($req->password);
            $t->name                = ['ar' => $req->name, 'en' => $req->name_en];
            $t->specialization_id   = $req->specialization_id;
            $t->gender_id           = $req->gender_id;
            $t->joining_date        = $req->joining_date;
            $t->address             = $req->address;
            $t->save();

            toastr()->success(__('trans.Success_Update'));
            return redirect()->route('teachers.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error', $e->getMessage()]);
        };
    }

    public function DeleteTeachers($req)
    {
        try {
            Teacher::findOrFail($req->id)->delete();

            toastr()->success(__('trans.Success_Delete'));
            return redirect()->route('teachers.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error', $e->getMessage()]);
        };
    }
}
