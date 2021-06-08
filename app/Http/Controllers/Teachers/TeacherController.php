<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;
use App\Repository\Teachers\TeacherRepositoryInterface;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    protected $teacherRepo;

    public function __construct(TeacherRepositoryInterface $teacherRepo)
    {
        $this->teacherRepo = $teacherRepo;
    }
    public function index()
    {
        $teachers = $this->teacherRepo->getAllTeachers();
        return view('pages.teachers.index', compact(['teachers']));
    }

    public function create()
    {
        $specs = $this->teacherRepo->GetSpecs();
        $genders = $this->teacherRepo->GetGenders();
        return view('pages.teachers.create', compact(['specs', 'genders']));
    }

    public function store(TeacherRequest $request)
    {
        return $this->teacherRepo->StoryTeachers($request);
    }

    public function edit($id)
    {
        $teacher = $this->teacherRepo->EditTeachers($id);
        $specs = $this->teacherRepo->GetSpecs();
        $genders = $this->teacherRepo->GetGenders();
        return view('pages.teachers.edit', compact(['specs', 'genders', 'teacher']));
    }

    public function update(Request $request)
    {
        return $this->teacherRepo->UpdateTeachers($request);
    }

    public function destroy(Request $request)
    {
        return $this->teacherRepo->DeleteTeachers($request);
    }
}
