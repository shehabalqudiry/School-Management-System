<?php

namespace App\Repository\Students;

use App\Models\Blood;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Image;
use App\Models\Level;
use App\Models\Nationalitie;
use App\Models\Section;
use App\Models\SParent;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentRepository implements StudentRepositoryInterface
{

    // Get All Teachers
    public function getAllStudents()
    {
        $students = Student::all();
        return view('pages.students.index', compact(['students']));
    }

    // Get All Levels For Geade Selected
    public function GetLevels($id)
    {
        $levels_list = Level::where('grade_id', $id)->pluck('name', 'id');
        return $levels_list;
    }

    // Get All Sections For Level Selected
    public function GetSections($id)
    {
        $sections_list = Section::where('level_id', $id)->pluck('name', 'id');
        return $sections_list;
    }

    public function CreateStudent()
    {
        $data['grades'] = Grade::all();
        $data['parents'] = SParent::all();
        $data['genders'] = Gender::all();
        $data['nationals'] = Nationalitie::all();
        $data['bloods'] = Blood::all();
        return view('pages.students.create', $data);
    }


    // Story Student To Database
    public function StoreStudent($req)
    {
        DB::beginTransaction();
        try {
            // $s Students Model
            $s = new Student();
            $s->email               = $req->email;
            $s->password            = Hash::make($req->password);
            $s->name                = ['ar' => $req->name, 'en' => $req->name_en];
            $s->gender_id           = $req->gender_id;
            $s->nationalitie_id     = $req->nationalitie_id;
            $s->blood_id            = $req->blood_id;
            $s->date_birth          = $req->date_birth;
            $s->grade_id            = $req->grade_id;
            $s->level_id            = $req->level_id;
            $s->section_id          = $req->section_id;
            $s->sparent_id          = $req->sparent_id;
            $s->academic_year       = $req->academic_year;
            $s->save();

            if ($req->hasfile('photos')) {
                foreach ($req->photos as $photo) {
                    $photo->storeAs('attachments/students/' . $s->name, $photo->hashName(), 'attachments');
                    Image::create([
                        'filename'         => $photo->hashName(),
                        'imageable_id'      => $s->id,
                        'imageable_type'      => "App\Models\Student",
                    ]);
                }
            }
            DB::commit();
            toastr()->success(__('trans.Success_Add'));
            return redirect()->route('students.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error', $e->getMessage()]);
        };
    }

    public function EditStudent($id)
    {
        $data['grades'] = Grade::all();
        $data['parents'] = SParent::all();
        $data['genders'] = Gender::all();
        $data['nationals'] = Nationalitie::all();
        $data['bloods'] = Blood::all();
        $data['student'] = Student::findOrFail($id);
        return view('pages.students.edit', $data);
    }

    // Story Student To Database
    public function UpdateStudent($req)
    {
        try {
            // $s Teacher Model
            $s = Student::findOrFail($req->id);
            $s->email               = $req->email;
            $s->password            = Hash::make($req->password);
            $s->name                = ['ar' => $req->name, 'en' => $req->name_en];
            $s->gender_id           = $req->gender_id;
            $s->nationalitie_id     = $req->nationalitie_id;
            $s->blood_id            = $req->blood_id;
            $s->date_birth          = $req->date_birth;
            $s->grade_id            = $req->grade_id;
            $s->level_id            = $req->level_id;
            $s->section_id          = $req->section_id;
            $s->sparent_id          = $req->sparent_id;
            $s->academic_year       = $req->academic_year;
            $s->save();

            toastr()->success(__('trans.Success_Update'));
            return redirect()->route('students.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error', $e->getMessage()]);
        };
    }

    public function ShowStudent($id){
        $student = Student::where('id', $id)->first();
        return $student;
    }

    public function DeleteStudent($id){
        Student::destroy($id);
        toastr()->success(__('trans.Success_Delete'));
        return redirect()->route('students.index');
    }

    // Upload New Attachment Student To Database
    public function UploadAttachment($req)
    {
        if ($req->hasfile('photos')) {
            foreach ($req->photos as $photo) {
                $photo->storeAs('attachments/students/' . $req->student_name, $photo->hashName(), 'attachments');
                Image::create([
                    'filename'         => $photo->hashName(),
                    'imageable_id'      => $req->student_id,
                    'imageable_type'      => "App\Models\Student",
                ]);
            }
        }
        toastr()->success(__('trans.Success_Add'));
        return redirect()->route('students.show', $req->student_id);
    }

    // Delete Attachment Student From Database
    public function DownloadAttachment($studentname, $filename)
    {
        return response()->download(public_path('attachments/students/' . $studentname . '/' . $filename));
    }

    // Delete Attachment Student From Database
    public function DeleteAttachment($req)
    {
        try{
            Storage::disk('attachments')->delete('attachments/students/' . $req->student_name . '/' . $req->filename);
            Image::destroy($req->id);
            toastr()->success(__('trans.Success_Delete'));
            return redirect()->route('students.show', $req->student_id);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error', $e->getMessage()]);
        };
    }
}
