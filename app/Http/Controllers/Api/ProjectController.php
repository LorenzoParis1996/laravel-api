<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {

        $projects = Project::with('type' , 'technologies')->paginate(3); //eager loading (carica tutti i progetti).
        //$projects = Project::paginate(5); //lazy loading (carica numero specificato di progetti).

        return response()->json([
            'success' =>true,
            'results' =>$projects
        ]);
    }

    public function show(string $id) {

        $project = Project::with('type' , 'technologies')->findOrFail($id);

        return response()->json([
            'success' =>true,
            'results' =>$project
        ]);
    }
}