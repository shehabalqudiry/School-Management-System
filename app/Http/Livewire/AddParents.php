<?php

namespace App\Http\Livewire;

use App\Models\Blood;
use App\Models\Image;
use App\Models\Nationalitie;
use App\Models\ParentAttachment;
use App\Models\Religion;
use App\Models\SParent;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;


class AddParents extends Component
{
    use WithFileUploads;
    // Define Public Variables

    public
        $currentStep = 1,
        $showTable = true,
        $updateMode = false,
        // Father_INPUTS
        $email, $parent_id, $password,
        $name_father, $name_father_en,
        $national_id_father, $Passport_id_father,
        $phone_father, $job_father, $job_father_en,
        $nationality_father_id, $blood_Type_father_id,
        $religion_father_id, $address_father,

        // Mother_INPUTS
        $name_mother, $name_mother_en,
        $national_id_mother, $passport_id_mother,
        $phone_mother, $job_mother, $job_mother_en,
        $nationality_mother_id, $blood_Type_mother_id,
        $religion_mother_id, $address_mother,

        // Photos Upload
        $photos,

        // Messages
        $successMessage = '',
        $errorMessage = '';

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'email' => 'required|email',
            'national_id_father' => 'required|string|min:10|max:14|regex:/[0-9]{13}/',
            'Passport_id_father' => 'min:10|max:14',
            'phone_father' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'national_id_mother' => 'required|string|min:10|max:14|regex:/[0-9]{13}/',
            'passport_id_mother' => 'min:10|max:14',
            'phone_mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);
    }
    public function render()
    {

        return view('livewire.add-parents', [
            'sparents' => SParent::all(),
            'Nationalities' => Nationalitie::all(),
            'Type_Bloods' => Blood::all(),
            'Religions' => Religion::all(),
        ]);
    }

    public function showAdd()
    {
        $this->showTable = false;
    }

    //firstStepSubmit
    public function firstStepSubmit()
    {
        $this->validate([
            'email' => 'required|unique:sparents,email,' . $this->id,
            'password' => 'required',
            'name_father' => 'required',
            'name_father_en' => 'required',
            'job_father' => 'required',
            'job_father_en' => 'required',
            'national_id_father' => 'required|unique:sparents,national_id_father,' . $this->id,
            'Passport_id_father' => 'required|unique:sparents,Passport_id_father,' . $this->id,
            'phone_father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'nationality_father_id' => 'required',
            'blood_Type_father_id' => 'required',
            'religion_father_id' => 'required',
            'address_father' => 'required',
        ]);

        $this->currentStep = 2;
    }

    //secondStepSubmit
    public function secondStepSubmit()
    {
        $this->validate([
            'email' => 'required|unique:sparents,email,' . $this->id,
            'password' => 'required',
            'name_mother' => 'required',
            'name_mother_en' => 'required',
            'job_mother' => 'required',
            'job_mother_en' => 'required',
            'national_id_mother' => 'required|unique:sparents,national_id_mother,' . $this->id,
            'passport_id_mother' => 'required|unique:sparents,passport_id_mother,' . $this->id,
            'phone_mother' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'nationality_mother_id' => 'required',
            'blood_Type_mother_id' => 'required',
            'religion_mother_id' => 'required',
            'address_mother' => 'required',
        ]);

        $this->currentStep = 3;
    }


    //back
    public function back($step)
    {
        $this->currentStep = $step;
    }

    public function firstStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 2;
    }

    public function secondStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 3;
    }



    public function clearForm()
    {
        $this->email = '';
        $this->password = '';
        $this->name_father = '';
        $this->name_father_en = '';
        $this->national_id_father = '';
        $this->Passport_id_father = '';
        $this->phone_father = '';
        $this->job_father = '';
        $this->job_father_en = '';
        $this->nationality_father_id = '';
        $this->blood_Type_father_id = '';
        $this->religion_father_id = '';
        $this->address_father = '';

        // Mother_INPUTS
        $this->name_mother = '';
        $this->name_mother_en = '';
        $this->national_id_mother = '';
        $this->passport_id_mother = '';
        $this->phone_mother = '';
        $this->job_mother = '';
        $this->job_mother_en = '';
        $this->nationality_mother_id = '';
        $this->blood_Type_mother_id = '';
        $this->religion_mother_id = '';
        $this->address_mother = '';
    }

    // Save Data In Database
    public function submitForm()
    {
        try {
            $data = [
                // Father_INPUTS
                'email'                                     => $this->email,
                'password'                                  => Hash::make($this->password),
                'name_father'                               => ['ar' => $this->name_father, 'en' => $this->name_father_en],
                'national_id_father'                        => $this->national_id_father,
                'Passport_id_father'                        => $this->Passport_id_father,
                'phone_father'                              => $this->phone_father,
                'job_father'                                => ['ar' => $this->job_father, 'en' => $this->job_father_en],
                'nationality_father_id'                     => $this->nationality_father_id,
                'blood_Type_father_id'                      => $this->blood_Type_father_id,
                'religion_father_id'                        => $this->religion_father_id,
                'address_father'                            => $this->address_father,

                // Mother_INPUTS
                'name_mother'                               => ['ar' => $this->name_mother, 'en' => $this->name_mother_en],
                'national_id_mother'                        => $this->national_id_mother,
                'passport_id_mother'                        => $this->passport_id_mother,
                'phone_mother'                              => $this->phone_mother,
                'job_mother'                                => ['ar' => $this->job_mother, 'en' => $this->job_mother_en],
                'nationality_mother_id'                     => $this->nationality_mother_id,
                'blood_Type_mother_id'                      => $this->blood_Type_mother_id,
                'religion_mother_id'                        => $this->religion_mother_id,
                'address_mother'                            => $this->address_mother
            ];

            SParent::create($data);
            if (!empty($this->photos)) {
                $p = SParent::latest()->first();
                foreach($this->photos as $photo) {
                    $photo->storeAs('attachments/parents/' . $p->name, $photo->hashName(), 'attachements');
                    Image::create([
                        'filename'         => $photo->hashName(),
                        'imageable_id'      => $p->id,
                        'imageable_type'      => "App\Models\SParent",
                    ]);
                }
            }

            $this->successMessage = __('trans.Success_Add');
            $this->clearForm();

            $this->currentStep = 1;
        } catch (\Exception $e) {
            $this->successMessage = '';
            $this->errorMessage = $e->getMessage();
        }
    }

    public function update($id)
    {

        $this->showTable = false;
        $this->updateMode = true;
        $sparent = SParent::where('id', $id)->first();

        $this->parent_id                = $id;
        $this->email                    = $sparent->email;
        $this->password                 = $sparent->password;
        $this->name_father              = $sparent->getTranslation('name_father', 'ar');
        $this->name_father_en           = $sparent->getTranslation('name_father', 'en');
        $this->national_id_father       = $sparent->national_id_father;
        $this->Passport_id_father       = $sparent->Passport_id_father;
        $this->phone_father             = $sparent->phone_father;
        $this->job_father               = $sparent->getTranslation('job_father', 'ar');
        $this->job_father_en            = $sparent->getTranslation('job_father', 'en');
        $this->nationality_father_id    = $sparent->nationality_father_id;
        $this->blood_Type_father_id     = $sparent->blood_Type_father_id;
        $this->religion_father_id       = $sparent->religion_father_id;
        $this->address_father           = $sparent->address_father;

        // Mother_INPUTS
        $this->name_mother              = $sparent->getTranslation('name_mother', 'ar');
        $this->name_mother_en           = $sparent->getTranslation('name_mother', 'en');
        $this->national_id_mother       = $sparent->national_id_mother;
        $this->passport_id_mother       = $sparent->passport_id_mother;
        $this->phone_mother             = $sparent->phone_mother;
        $this->job_mother               = $sparent->getTranslation('job_mother', 'ar');
        $this->job_mother_en            = $sparent->getTranslation('job_mother', 'en');
        $this->nationality_mother_id    = $sparent->nationality_mother_id;
        $this->blood_Type_mother_id     = $sparent->blood_Type_mother_id;
        $this->religion_mother_id       = $sparent->religion_mother_id;
        $this->address_mother           = $sparent->address_mother;
    }
    public function submitForm_Edit()
    {
        try {
            $sparent = SParent::find($this->parent_id);

            $data = [
                // Father_INPUTS
                'email'                                     => $this->email,
                'password'                                  => Hash::make($this->password),
                'name_father'                               => ['ar' => $this->name_father, 'en' => $this->name_father_en],
                'national_id_father'                        => $this->national_id_father,
                'Passport_id_father'                        => $this->Passport_id_father,
                'phone_father'                              => $this->phone_father,
                'job_father'                                => ['ar' => $this->job_father, 'en' => $this->job_father_en],
                'nationality_father_id'                     => $this->nationality_father_id,
                'blood_Type_father_id'                      => $this->blood_Type_father_id,
                'religion_father_id'                        => $this->religion_father_id,
                'address_father'                            => $this->address_father,

                // Mother_INPUTS
                'name_mother'                               => ['ar' => $this->name_mother, 'en' => $this->name_mother_en],
                'national_id_mother'                        => $this->national_id_mother,
                'passport_id_mother'                        => $this->passport_id_mother,
                'phone_mother'                              => $this->phone_mother,
                'job_mother'                                => ['ar' => $this->job_mother, 'en' => $this->job_mother_en],
                'nationality_mother_id'                     => $this->nationality_mother_id,
                'blood_Type_mother_id'                      => $this->blood_Type_mother_id,
                'religion_mother_id'                        => $this->religion_mother_id,
                'address_mother'                            => $this->address_mother
            ];

            $sparent->update($data);
            if (!empty($this->photos)) {
                foreach ($this->photos as $photo) {
                    $photo->storeAs($this->national_id_father, $photo->getClientOriginalName(), 'parent_attachements');
                    Image::where('imageable_id', $this->parent_id)->update([
                        'filename'         => $photo->getClientOriginalName(),
                        'imageable_id'      => $this->parent_id,
                        'imageable_type'      => "App\Models\SParent",
                    ]);
                }
            }

            $this->successMessage = __('trans.Success_Update');

            return redirect()->to('/parents');
        } catch (\Exception $e) {
            $this->successMessage = '';
            $this->errorMessage = $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $sparent = SParent::find($id);
            $sparent->delete();
            $this->successMessage = __('trans.Success_Delete');

        } catch (\Exception $e) {
            $this->successMessage = '';
            $this->errorMessage = $e->getMessage();
        }
    }
}
