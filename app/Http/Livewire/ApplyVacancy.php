<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplyVacancy extends Component
{
    use WithFileUploads;
    public $cv;
    public $vacante;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }
    public function apply()
    {
        $data = $this->validate();


        $cv = $this->cv->store('public/cv');

        // getting the image name
        $data['cv'] = str_replace("public/cv/", "", $cv);


        $this->vacante->Applicants()->create([
            'user_id' => auth()->user()->id,
            'cv' => $data['cv'],
        ]);

        session()->flash('message', 'Se ha aplicado correctamente a la vacante, mucha suerte');
    
        return redirect()->back();
    }
    public function render()
    {

        return view('livewire.apply-vacancy');
    }
}
