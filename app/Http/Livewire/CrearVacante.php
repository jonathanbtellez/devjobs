<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Salary;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{

    public $title;
    public $salary;
    public $category;
    public $company;
    public $deadline;
    public $description;
    public $image;

    // Let the form use files
    use WithFileUploads;


    protected $rules = [
        'title' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required|string',
        'deadline' => 'required',
        'description' => 'required',
        'image' => 'required|image|max:1024',
    ];

    public function createVacancy()
    {
        // 1. if the validate pass save the data
        // 2. validate
        // 3. pass the rules
        $data = $this->validate($this->rules);
    }

    public function render()
    {
        // Consult db
        // 1. call the method
        // 2. use all to get all registers
        $categories = Category::all();
        $salaries = Salary::all();


        
        // Send salies data to the view
        return view('livewire.crear-vacante',[
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}
