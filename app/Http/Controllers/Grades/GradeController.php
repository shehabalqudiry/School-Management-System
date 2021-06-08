<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGradeRequest;
use App\Models\Grade;

class GradeController extends Controller
{
    /****************************************
     *     Display a listing of Grades.     *
     ****************************************/
    public function index()
    {
        // Get All From
        $grades = Grade::all();
        return view('pages.grades.index', compact(['grades']));
    }


    /****************************************
     *       Create Grades in Database.     *
     ****************************************/
    public function store(StoreGradeRequest $request)
    {
        if (Grade::where('name->ar', $request->name)->orWhere('name->en', $request->name_en)->exists()) {
           return redirect()->back()->withErrors([__('trans.Grade_Exists')]);
        }
        try {
            // Validate Data
            $validated = $request->validated();

            $grade = new Grade();

            // Translation the name
            $grade->name = ['en' => $request->name_en, 'ar' => $request->name];
            $grade->notes = $request->notes ?? 'No Notes';

            // Data save in Database
            $grade->save();

            // Send Toster notification
            toastr()->success(__('trans.Success_Add'));
            return redirect()->route('grades.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    /****************************************
     *       Update Grades in Database.     *
     ****************************************/
    public function update(StoreGradeRequest $request, Grade $grade)
    {
        try {
            // Validate Data
            $validated = $request->validated();
            // Data Updated in Database
            $grade->update([
                // Translation the name
                'name' => ['en' => $request->name_en, 'ar' => $request->name],
                'notes' => $request->notes,
            ]);

            // Send Toster notification
            toastr()->success(__('trans.Success_Update'));
            return redirect()->route('grades.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /****************************************
     *       Delete Grades From Database.   *
     ****************************************/
    public function destroy(Grade $grade)
    {
        // dd(!$grade->levels->all());
        try {
            if(!$grade->levels->all()){

                $grade->delete();
                // Send Toster notification
                toastr()->success(__('trans.Success_Delete'));
                return redirect()->route('grades.index');
            } else {
                return redirect()->back()->withErrors(['error' => __('trans.Levels_Not_Empty')]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
