<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;

class VacanteController extends Controller
{
  
    public function index()
    {
        return view('vacantes.index');
    }

   
    public function create()
    {
        return view('vacantes.create');
    }

    public function show($id)
    {
        return view('vacantes.index');
    }
  
    public function edit(Vacante $vacancy)
    {   
        $this->authorize('update',$vacancy);
        return view('vacantes.edit', compact('vacancy'));
    }


    public function destroy(string $id)
    {
        //
    }
}
