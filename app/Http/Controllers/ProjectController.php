<?php

namespace App\Http\Controllers;
use App\Project;
use App\Skill;
use App\Student;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function create(){
        return view('projects.create');
    }

    public function store(Request $request){
        $project = new Project($request->all());
        $project->save();
        return redirect('/project');
    }

    public function index(){
        $project = Project::all();
        return view('projects.index',compact('project'));
    }

    public function show($project_id){
        $project = Project::with('skills')->find($project_id);
        $project_skills_id = $project->skills->pluck('id'); // [1,2,3]
        // select * from skills where id not in [1,2,3]
        $skills = Skill::whereNotIn('id', $project_skills_id)->get();
        $project_student_id = $project->students->pluck('id');
        $students = Student::whereNotIn('id',$project_student_id)->get();
      //dd($project->toArray());
        return view('projects.show',compact(['project','skills','students']));
    }
    public function edit($project_id){
        $project = Project::find($project_id);
        return view('projects.edit',compact('project'));
    }

    public function update(Request $request,$project_id){
        $project = Project::find($project_id);
        $project->update($request->all());
        $project->save();
        return redirect('/project/'.$project_id);

    }

    public function destroy($project_id){
        Project::destroy($project_id);
        return redirect('/project');
    }

    public function destroySkill($project_id, $skill_id){
        $project=Project::with('skills')->find($project_id);
        $project->skills()->detach($skill_id);
        return redirect()->back();
//        return $skill_id;
   // dd($skill_id)->toArray();
    }


    public function addskill(Request $request, $project_id)
    {
        $project = Project::with('skills')->find($project_id);
        $project->skills()->attach($request->skill_id);
        //return ($request->skill_id);
        return redirect()->back();
    }

    public function addstudent(Request $request, $project_id){
        $projects = Project::with('students')->find($project_id);
        $projects->students()->attach($request->student_id); //
        return redirect()->back();
    }

    public function destroyStudent($project_id, $student_id){
        $project = Project::with('students')->find($project_id);
        $project->students()->detach($student_id);
        return redirect()->back();
    }
}
