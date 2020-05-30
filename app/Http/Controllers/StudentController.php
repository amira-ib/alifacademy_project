<?php

namespace App\Http\Controllers;

use App\Group;
use App\Skill;
use App\SkillStudent;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create(){
        return view('students.create');
    }

    public function store(Request $request){
        $student= new Student($request->all());
        $student['image']=request()->file('image')->store('images');
        $student->save();
        return redirect('/student');
    }

    public function index(){
        $student=Student::with(['skills','groups'])->get();
        return view('students.index',compact('student'));
    }

    public function show($student_id){
        $students = Student::with(['skills','groups'])->find($student_id);
        $skill_student_id = $students->skills->pluck('id');
        $skills = Skill::whereNotIn('id',$skill_student_id )->get();
        return view('students.show',compact([
            'students',
            'skills',
        ]));
    }

    public function edit($student_id){
        $students=Student::find($student_id);
        return view('students.edit',compact('students'));
    }

    public function update(Request $request,$student_id){
        $student=Student::find($student_id);
        $student->update($request->all());
        $student->save;
        return redirect('student/'.$student_id);
    }

    public function destroy($student_id){
        Student::destroy($student_id);
        return redirect('/student');
    }

    public function addskill(Request $request, $student_id){
        $student_skill = SkillStudent::create([
            'student_id' => request('student_id'),
            'skill_id' => request('skill_id'),
            'score'=> request('score')
        ]);

        return redirect()->back();
    }

    public function destroy_skill($student_id, $skill_id){
        $student = Student::with('skills')->find($student_id);
        $student->skills()->detach($skill_id);
        return redirect()->back();
    }

    public function edit_skill_score($skillstudent_id){
        $studentskill = SkillStudent::find($skillstudent_id);
        return view('students.editskillscore',compact('studentskill'));
    }

    public function update_skill_score(Request $request, $studentskill_id){
        $studentskill = SkillStudent::find($studentskill_id);
        $student_id = $studentskill->student_id;
        $studentskill->score = $request->score;
        $studentskill->save();
        return redirect('/student/'.$student_id);
    }
}
