<?php

namespace App\Http\Controllers\Sections;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectionRequest;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SectionController extends Controller
{

    /****************************************
     * Display a listing of Academic levels.*
     ****************************************/
    public function index()
    {
        $grades = Grade::with(['sections'])->get();
        $list_grades = Grade::all();
        $teachers = Teacher::all();
        return view('pages.sections.index', compact(['grades', 'list_grades', 'teachers']));
    }

    public function store(SectionRequest $request)
    {
        try {
            $validated = $request->validated();
            $section = new Section();

            // Translation the name
            $section->name = ['en' => $request->name_en, 'ar' => $request->name];
            $section->grade_id = $request->grade_id;
            $section->level_id = $request->level_id;
            $section->status = $request->status ? 1 : 0;

            // Data save in Database
            $section->save();
            $section->teachers()->attach($request->teacher_id);

            toastr()->success(__('trans.Success_Add'));
            return redirect()->route('sections.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function update(SectionRequest $request, Section $section)
    {
        try {
            $validated = $request->validated();
            if(isset($request->teacher_id)){
                $section->teachers()->sync($request->teacher_id);
            }else {
                $section->teachers()->sync(array());
            }
            $section->update([
                // Translation the name
                'name' => ['en' => $request->name_en, 'ar' => $request->name],
                'grade_id' => $request->grade_id,
                'status' => $request->status ? 1 : 0,
            ]);

            // Send Toster notification
            toastr()->success(__('trans.Success_Update'));
            return redirect()->route('sections.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Section $section)
    {
        try {
            $section->delete();
            // Send Toster notification
            toastr()->success(__('trans.Success_Delete'));
            return redirect()->route('sections.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
