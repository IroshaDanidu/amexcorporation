<?php

namespace App\Http\Controllers;

use App\Models\TrainingPrograms;

class ProgramController extends Controller
{
    public function index()
    {

    }

    public function show($id)
    {
        $program = TrainingPrograms::with(['trainers', 'trainingTypes'])->findOrFail($id);
        return view('program-details', compact('program'));
    }
}
