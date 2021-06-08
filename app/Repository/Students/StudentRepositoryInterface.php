<?php

namespace App\Repository\Students;

interface StudentRepositoryInterface
{
    // Get All Teachers
    public function getAllStudents();

    // Create View Page Students
    public function CreateStudent();

    // Edit View Page Students
    public function EditStudent($id);

    // Get All Levels For Geade Selected
    public function GetLevels($id);

    // Get All Sections For Level Selected
    public function GetSections($id);

    // Store Student To Database
    public function StoreStudent($req);

    // Show Student From Database
    public function ShowStudent($id);

    // Update Students in Database
    public function UpdateStudent($req);

    // Delete Students in Database
    public function DeleteStudent($id);

    // Upload New Attachment Student To Database
    public function UploadAttachment($req);

    // Download Attachment Student To Database
    public function DownloadAttachment($studentname, $filename);

    // Delete Attachment Student From Database
    public function DeleteAttachment($req);


}
