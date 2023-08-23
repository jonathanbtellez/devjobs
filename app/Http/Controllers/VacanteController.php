<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;

class VacanteController extends Controller
{

    public function index()
    {
        $this->authorize('viewAny', Vacante::class);
        return view('vacantes.index');
    }


    public function create()
    {
        $this->authorize('create', Vacante::class);
        return view('vacantes.create');
    }

    public function show(Vacante $vacancy)
    {
        return view('vacantes.show', compact('vacancy'));
    }

    public function edit(Vacante $vacancy)
    {
        $this->authorize('update', $vacancy);
        return view('vacantes.edit', compact('vacancy'));
    }


    public function destroy(string $id)
    {
        //
    }
}
