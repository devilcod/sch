<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Setting;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Settings extends Component
{
    use WithFileUploads;

    public $name;
    public $address;
    public $phone;
    public $email;
    public $accreditation;
    public $npsn;
    public $logo;
    public $newLogo;

    protected $rules = [
        'name' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'accreditation' => 'required',
        'npsn' => 'required',
        'logo' => 'nullable|image',
    ];
    public function mount()
    {
        $setting = Setting::first();
        $this->name = $setting->name;
        $this->address = $setting->address;
        $this->phone = $setting->phone;
        $this->email = $setting->email;
        $this->accreditation = $setting->accreditation;
        $this->npsn = $setting->npsn;
        $this->logo = $setting->logo;
    }

    public function render()
    {
        return view('livewire.settings');
    }
    public function updateSetting()
        {
            $validatedData = $this->validate();
            $logo_name = $this->logo->store('logos', 'public');
            $validatedData['logo'] = $logo_name;
            Setting::first()->update($validatedData);
        }

        public function updatedLogo()
        {
            $this->validate([
                'logo' => 'image',
            ]);
            $this->newLogo = $this->logo->temporaryUrl();
        }
}
