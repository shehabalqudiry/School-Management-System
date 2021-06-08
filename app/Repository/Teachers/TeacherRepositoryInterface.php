<?php

namespace App\Repository\Teachers;

interface TeacherRepositoryInterface
{
    // Get All Teachers
    public function getAllTeachers();

    // Get All Specialization
    public function GetSpecs();

    // Get All Genders
    public function GetGenders();

    // Story Teacher
    public function StoryTeachers($req);

    // Edit Teacher
    public function EditTeachers($id);

    // Update Teacher
    public function UpdateTeachers($req);

    // Delete Teacher
    public function DeleteTeachers($req);
}
