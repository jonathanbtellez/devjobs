<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Vacante $vacancy)
    {   
        return view('applicants.index', compact('vacancy'));
    }
}
