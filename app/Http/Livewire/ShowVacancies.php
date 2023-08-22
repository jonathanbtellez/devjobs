<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class ShowVacancies extends Component
{
    public function render()
    {
        // Get the vacancies registers
        $vacancies = Vacante::where("user_id", auth()->user()->id)->paginate(10);
        
        // return de component and pass the data to the view
        return view('livewire.show-vacancies', compact('vacancies'));
    }
}
