<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Salary;
use App\Models\Vacante;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;



class EditVacancy extends Component
{
    public $vacancy_id;
    public $title;
    public $salary;
    public $category;
    public $company;
    public $deadline;
    public $description;
    public $image;

    public $newImage;

    use WithFileUploads;
    protected $rules = [
        'title' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required|string',
        'deadline' => 'required',
        'description' => 'required',
        'newImage' => 'nullable|image|max:1024',

    ];

    public function mount(Vacante $vacancy){
        $this->vacancy_id = $vacancy->id;
        $this->title = $vacancy->title;
        $this->salary = $vacancy->salary_id;
        $this->category = $vacancy->category_id;
        $this->company = $vacancy->company;
        $this->deadline = Carbon::parse($vacancy->deadline)->format('Y-m-d');
        $this->description = $vacancy->description;
        $this->image = $vacancy->image;
    }

    public function editVacancy()
    {
        // 1. if the validate pass save the data
        // 2. validate
        $data = $this->validate();

        // Storage image
        // using store method we can save a image whe online need git a path to save
        // the store method aim to storage/app
        if($this->newImage){

            $image = $this->newImage->store('public/vacancies');
            // getting the image name
            $data['image'] = str_replace("public/vacancies", "", $image);
        }else{
            $data['image'] = $this->image;
        }
        
        $vacancy = Vacante::find($this->vacancy_id);
        $vacancy->title = $data['title'];
        $vacancy->salary_id = $data['salary'];
        $vacancy->category_id = $data['category'];
        $vacancy->company = $data['company'];
        $vacancy->deadline = $data['deadline'];
        $vacancy->description = $data['description'];
        $vacancy->image = $data['image'];
        $vacancy->save();


        //Create message
        session()->flash('message','Vacancy: '.$vacancy->title.' updated');

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
        return view('livewire.edit-vacancy', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}
