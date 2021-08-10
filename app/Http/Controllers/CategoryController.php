<?php

namespace App\Http\Controllers;


use App\Project;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        // $projects = Project::where('category_id','category->id')->latest()->paginate(); NO FUNCIONA IDEA MIA
        $newProject = new Project;

        $projects = $category->projects()->with('category')->paginate(); //PROJECTS es del modelo lo hacemos metodo "()" para tener acceso al query builder

        $deleteProjects = Project::onlyTrashed()->get();

        return view('projects.index',compact('projects', 'category', 'newProject', 'deleteProjects'));
    }
}
