<?php

namespace App\Repository\Students\Promotions;

use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class PromotionRepository implements PromotionRepositoryInterface
{
    public function index()
    {
        $grades = Grade::all();
        return view('pages.students.promotions.index', compact(['grades']));
    }

    public function create()
    {
        $promotions = promotion::all();
        return view('pages.students.promotions.management', compact('promotions'));
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {
            $students = Student::where('grade_id', $request->grade_id)->where('level_id', $request->level_id)->where('section_id', $request->section_id)->get();
            // update in table student

            if ($students->count() < 1) {
                return redirect()->back()->with('error_promotions', __('لاتوجد بيانات في جدول الطلاب'));
            }
            foreach ($students as $student) {

                $ids = explode(',', $student->id);

                student::whereIn('id', $ids)
                    ->update([
                        'grade_id' => $request->grade_id_new,
                        'level_id' => $request->level_id_new,
                        'section_id' => $request->section_id_new,
                        'academic_year' => $request->academic_year_new,
                    ]);

                // insert in to promotions
                Promotion::updateOrCreate([
                    // Student ID
                    'student_id' => $student->id,
                    // From
                    'from_grade' => $request->grade_id,
                    'from_level' => $request->level_id,
                    'from_section' => $request->section_id,
                    'academic_year' => $request->academic_year,
                    // To
                    'to_grade' => $request->grade_id_new,
                    'to_level' => $request->level_id_new,
                    'to_section' => $request->section_id_new,
                    'academic_year_new' => $request->academic_year_new,
                ]);
            }
            DB::commit();

            toastr()->success(__('trans.Success_Update'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        DB::beginTransaction();

        try {

            // التراجع عن الكل
            if ($request->page_id == 1) {

                $promotions = Promotion::all();
                foreach ($promotions as $promotion) {
                    //التحديث في جدول الطلاب
                    $ids = explode(',', $promotion->student_id);
                    student::whereIn('id', $ids)
                        ->update([
                            'grade_id' => $promotion->from_grade,
                            'level_id' => $promotion->from_level,
                            'section_id' => $promotion->from_section,
                            'academic_year' => $promotion->academic_year,
                        ]);

                    //حذف جدول الترقيات
                    Promotion::truncate();
                }
                DB::commit();
                toastr()->error(trans('messages.Delete'));
                return redirect()->back();
            } else {
                //التحديث في جدول الطلاب
                $promotion = Promotion::findOrFail($request->id);

                student::where('id', $promotion->student_id)
                    ->update([
                        'grade_id' => $promotion->from_grade,
                        'level_id' => $promotion->from_level,
                        'section_id' => $promotion->from_section,
                        'academic_year' => $promotion->academic_year,
                    ]);

                //حذف جدول الترقيات
                $promotion->destroy();
                DB::commit();
                toastr()->error(trans('messages.Delete'));
                return redirect()->back();
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
