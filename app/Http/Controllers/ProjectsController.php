<?php

namespace App\Http\Controllers;

use App\Project;
use App\Category;
use App\Events\ProjectSaved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SaveProjectRequest;
// use Illuminate\Support\Facades\DB;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show','index');
    }

    public function index(){

        // $projects = DB::table('projects')->get();
        // $projects = Project::orderBy('created_at', 'asc')->get();
        $newProject = new Project; // creamos una instancia para pode usar can en la vista

        $projects = Project::with('category')->latest()->paginate(); //se muestran 15 por pagina por default

        $deleteProjects = Project::onlyTrashed()->get();

        return view('projects.index',compact('projects', 'newProject', 'deleteProjects'));
    }

    public function show(Project $project)
    {
        // $projects = Project::findOrFail($id);

        return view('projects.show',compact('project'));
    }

    public function create(Project $project)
    {
        $project = new Project;

        $this->authorize('create', $project);

        $categories = Category::pluck('name','id');

        return view('projects.create',compact('project','categories'));
    }

    public function store(SaveProjectRequest $request)
    {
        //Este formulario esta validado por formRequest
        // Project::create($request->all()); no se utiliza ya que pasa todos lo campos y pueden hacer inyeccion de sql
        // return $request;
        $project = new Project($request->validated());

        $this->authorize('create', $project);

        $project->image = $request->file('image')->store('image','public');

        $project->save();

        //optimizar imagenes en la base de datos disparar el evento (El evento solo almacena el objeto project eñ listener es el que ejecuta)
        ProjectSaved::dispatch($project);

        return redirect()->route('projects.index')->with('status','the project was created');
    }

    public function edit(Project $project)
    {
        $this->authorize('update', $project);

        $categories = Category::pluck('name', 'id');

        return view('projects.edit',compact('project','categories'));
    }

    public function update(Project $project, SaveProjectRequest $request)
    {
        $this->authorize('update', $project);

        if($request->hasfile('image')){
            Storage::disk('public')->delete($project->image);
            $project = $project->fill($request->validated());
            $project->image = $request->file('image')->store('image','public');
            $project->save();

            //optimizar imagenes en la base de datos
            ProjectSaved::dispatch($project);

        } else{
            $project->update(array_filter($request->validated()));
        }
        return redirect()->route('projects.show', $project)->with('status', 'The project was updated successfully');
    }

    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        $project->delete();

        return redirect()->route('projects.index')->with('status','The project was deleted successfully');
    }

    public function restore($projectUrl)
    {
        $project = Project::withTrashed()->where('url', $projectUrl)->firstOrFail();

        $this->authorize('restore', $project);

        $project->restore();

        return redirect()->route('projects.index')->with('status', 'project successfully restored');
    }

    public function forceDelete($projectUrl)
    {

        $project = Project::withTrashed()->whereUrl($projectUrl)->firstOrFail();

        $this->authorize('forceDelete', $project);

        Storage::disk('public')->delete($project->image);

        $project->forceDelete();

        return redirect()->route('projects.index')->with('status','the project was permanently removed');
    }
}
