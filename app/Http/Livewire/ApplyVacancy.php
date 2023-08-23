<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use App\Notifications\NewApply;
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

        // Send application
        $this->vacante->Applicants()->create([
            'user_id' => auth()->user()->id,
            'cv' => $data['cv'],
        ]);

        // 1. get the vacante info
        // 2. with the relation belongs to get the info of the recuiter
        // 3. with method notify create the notification
        // 4. Instance a new notification object (new Apply) 
        // 5. pass in the cconstructor the info that you want to send in the notification
        $this->vacante->recruiter->notify(new NewApply($this->vacante->id, $this->vacante->title, auth()->user()->id));



        session()->flash('message', 'Se ha aplicado correctamente a la vacante, mucha suerte');
    
        return redirect()->back();
    }
    public function render()
    {

        return view('livewire.apply-vacancy');
    }
}
