<?php

namespace App\Http\Controllers;
use App\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function create(){
        return view('skills.create');
    }

    public function store(Request $request){
        $skill = new Skill($request->all());
        $skill->save();
        return redirect('/skill');
    }

    public function index(){
        $skill = Skill::all();
        return view('skills.index',compact('skill'));
    }

    public function show($skill_id){
        $skill = Skill::with('students')->find($skill_id);
        return view('skills.show',compact('skill'));
    }

    public function edit($skill_id){
        $skill = Skill::find($skill_id);
        return view('skills.edit',compact('skill'));
    }

    public function update(Request $request,$skill_id){
        $skill = Skill::find($skill_id);
        $skill->update($request->all());
        $skill->save();
        return redirect('/skill');
    }

    public function destroy($skill_id){
        Skill::destroy($skill_id);
        return redirect('/skill');
    }
}
