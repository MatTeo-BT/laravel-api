<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('type', 'technology')->paginate(20);

        return response()->json(
            [
                "success" => true,
                "results" => $projects
            ]
        );
    }

    public function show(Project $project)
    {
        return response()->json($project);
    }


    public function search(Request $request)
    {

        $data = $request->all();

        if (isset($data['find'])) {
            $stringa = $data['find'];

            $projects = Project::where('status', 'LIKE', "%{$stringa}%")->get();
        } elseif (is_null($data['find'])) {
            $projects = Project::all();
        } else {
            abort(404);
        }

        return response()->json([
            "success" => true,
            "results" => $projects,

            "matches" => count($projects)
        ]);
    }
}