<?php

namespace App\Http\Controllers;
use App\Group;
use App\Student;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function create(){
        return view('groups.create');
    }

    public function store(Request $request){
        $group=new Group($request->all());
        $group->save();
        return redirect('/group');
    }

    public function index(){
        $group=Group::all();
        return view('groups.index',compact('group'));
    }

    public function show($group_id){
        $group=Group::find($group_id);
        $group_student_id = $group->students->pluck('id');
        $student=Student::whereNotIn('id',$group_student_id)->get();
        return view('groups.show',compact(['group','student']));
    }

    public function edit($group_id){
        $group=Group::find($group_id);
        return view('groups.edit',compact('group'));
    }

    public function update(Request $request,$group_id){
        $group=Group::find($group_id);
        $group->update($request->all());
        $group->save;
        return redirect('group/'.$group_id);

    }
    public function destroy($group_id){
        Group::destroy($group_id);
        return redirect('/group');
    }

    public function addstudent(Request $request,$group_id){
        $group = Group::with('students')->find($group_id);
        $group->students()->attach($request->student_id);
        return redirect()->back();
    }

    public function destroyStudent($group_id, $student_id){
        $group = Group::with('students')->find($group_id);
        $group->students()->detach($student_id);
        return redirect()->back();
    }
}
