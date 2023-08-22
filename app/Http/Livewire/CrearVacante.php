<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Salary;
use App\Models\Vacante;
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

        // Storage image
        // using store method we can save a image whe online need git a path to save
        // the store method aim to storage/app
        $image = $this->image->store('public/vacancies');

        // getting the image name
        $data['image'] = str_replace("public/vacancies", "", $image);

        // Creating vacancy
        Vacante::create([
            'title' => $data["title"],
            'salary_id' => $data["salary"],
            'category_id' => $data["category"],
            'company' => $data["company"],
            'deadline' => $data["deadline"],
            'description' => $data["description"],
            'image' => $data['image'],
            'user_id' => auth()->user()->id
        ]);

        //Create message
        session()->flash('message','Vacancy created');

        // Redirect the user
        return redirect()->route('vacantes.index');
    }

    public function render()
    {
        // Consult db
        // 1. call the method
        // 2. use all to get all registers
        $categories = Category::all();
        $salaries = Salary::all();



        // Send salaries data to the view
        return view('livewire.crear-vacante', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}
