<?php

namespace App\Http\Controllers\Levels;

use App\Http\Controllers\Controller;
use App\Http\Requests\LevelRequest;
use App\Models\Grade;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /****************************************
     * Display a listing of Academic levels.*
     ****************************************/
    public function index()
    {
        $levels = Level::all();
        $grades = Grade::all();
        return view('pages.levels.index', compact(['levels', 'grades']));
    }

    /****************************************
     *        Create Academic levels.       *
     ****************************************/

    public function store(LevelRequest $request)
    {
        // Validate Data
        $validated = $request->validated();
        $list_levels = $request->list_levels;
        try {
            foreach ($list_levels as $l) {
                $level = new Level();

                // Translation the name
                $level->name = ['en' => $l['name_en'], 'ar' => $l['name']];
                $level->grade_id = $l['grade_id'];

                // Data save in Database
                $level->save();
            }
            // Send Toster notification
            toastr()->success(__('trans.Success_Add'));
            return redirect()->route('levels.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    /****************************************
     *        Update Academic levels.       *
     ****************************************/
    public function update(LevelRequest $request, Level $level)
    {
        try {
            $validated = $request->validated();

            $level->update([
                // Translation the name
                'name' => ['en' => $request->name_en, 'ar' => $request->name],
                'grade_id' => $request->grade_id,
            ]);

            // Send Toster notification
            toastr()->success(__('trans.Success_Update'));
            return redirect()->route('levels.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /****************************************
     *        Remove Academic levels.       *
     ****************************************/
    public function destroy(Level $level)
    {
        $level->delete();

        toastr()->success(__('trans.Success_Delete'));
        return redirect()->route('levels.index');
    }
    /****************************************
     *        Remove Academic levels.       *
     ****************************************/
    public function destroy_selected(Request $request)
    {
        $all_id = explode(',', $request->delete_all_id);
        Level::whereIn('id', $all_id)->delete();

        toastr()->success(__('trans.Success_Delete'));
        return redirect()->route('levels.index');
    }

    public function filters(Request $request){
        $id = $request->grade_id;
        $grades = Grade::all();
        $filter = Level::select('*')->where('grade_id', $id)->get();
        return view('pages.levels.index', compact(['grades']))->withDetails($filter);
    }

    public function list($id){

        $list_levels = Level::where('grade_id', $id)->pluck('name', 'id');
        
        return $list_levels;
    }
}
