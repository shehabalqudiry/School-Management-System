<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Repository\Students\StudentRepositoryInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $StudentRepo;

    public function __construct(StudentRepositoryInterface $StudentRepo)
    {
        $this->StudentRepo = $StudentRepo;
    }
    // Index
    public function index()
    {
        return $this->StudentRepo->getAllStudents();
    }

    public function create()
    {
        return $this->StudentRepo->CreateStudent();
    }

    public function store(StoreStudentRequest $request)
    {
        return $this->StudentRepo->StoreStudent($request);
    }

    public function show($id)
    {
        $student = $this->StudentRepo->ShowStudent($id);
        return view('pages.students.show', compact(['student']));
    }

    public function edit($id)
    {
        return $this->StudentRepo->EditStudent($id);
    }

    public function update(Request $request)
    {
        return $this->StudentRepo->UpdateStudent($request);
    }

    public function destroy($id)
    {
        return $this->StudentRepo->DeleteStudent($id);
    }

    public function get_levels($id)
    {
        return $this->StudentRepo->GetLevels($id);
    }

    public function get_sections($id)
    {
        return $this->StudentRepo->GetSections($id);
    }

    public function Upload_attachment(Request $req)
    {
        return $this->StudentRepo->UploadAttachment($req);
    }

    public function download_attachment($studentname, $filename)
    {
        return $this->StudentRepo->DownloadAttachment($studentname, $filename);
    }

    public function delete_attachment(Request $req)
    {
        return $this->StudentRepo->DeleteAttachment($req);
    }
}
