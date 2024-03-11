<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentQualification;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $students = student::all();
        $students = student::paginate(5);
        // $students = student::where('id', 1234567)->get();
        return view("student.index", compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("student.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'dob' => 'required',
            'email' => 'required|email',
            'mobile_number' => 'required|between:10, 12',
            'gender' => 'required',
            'address' => 'required',
            'city' => 'required',
            'pin_code' => 'required',
            'state' => 'required',
            'country' => 'required',
            'hobbies' => 'required',
            'courses' => 'required'
        ],
        [
            'first_name.required' => 'First Name field is required'
        ]);


        $data = $request->all();
        // dd($data);
        $data['hobbies'] = implode(',', $data['hobbies']);
        // $reques->name;
        // $reques->only('name','email');
        $student = Student::create($data);
        $studentId = $student->id;
        $examination = $request->examination;
        $board = $request->board;
        $percentage = $request->percentage;
        $year_of_passing = $request->year_of_passing;

        foreach ($examination as $key => $_examination) {
            // echo "<br>" . $studentId;

            StudentQualification::create([
                'examination' => $_examination,
                'board' => $board[$key],
                'percentage' => $percentage[$key],
                'passing_year' => $year_of_passing[$key],
                'student_id' => $studentId
            ]);
        }
        return redirect()->route('student.index')->withSuccess('Data Insreted...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit(Student $student)
    public function edit($id)
    {
        // $student = Student::select()->where('id',$id)->first();
        $student = Student::find($id);        
        $studentQul = StudentQualification::where('student_id',$id)->get();
        return view('student.edit', compact('student','studentQul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $data = $request->except('_token', '_method');

        $data['hobbies']=implode(',',$data['hobbies']);
        $student->update($data);

        $studentQulfil= $request->studentID;
        $examination=$request->examination;
        $board=$request->board;
        $percentage = $request->percentage;
        $year_of_passing = $request->year_of_passing;

        foreach($examination as $key => $_examination){
            $stQlId=$studentQulfil[$key];

            StudentQualification::where('id',$stQlId)->update([
                'examination' => $_examination,
                'board' => $board[$key] ?? 0,
                'percentage' => $percentage[$key],
                'passing_year' => $year_of_passing[$key]
            ]);

        }

        return redirect()->route('student.index')->withSuccess('Data Updated...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        student::where('id', $id)->delete();
        StudentQualification::where('student_id', $id)->delete();
        return redirect()->route('student.index')->withSuccess('Data Updated...');
    }
    //         public function destroy(Student $student)
    // {
    //     student::delete();
    //     return redirect()->route('student.index')->withSuccess('Data Updated...');
    // }
}
