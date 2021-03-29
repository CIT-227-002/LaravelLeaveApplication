<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use App\Mail\leavemail;
use App\Mail\Leavemail2;
use App\Mail\Leavemail3;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=student::all();

        $students->transform(function($student) {
            // $student->status = ($student->status) ? 'Approved' : 'Pending';
            if ($student->status == 0) {
                $student->status = 'Pending';
            } elseif ($student->status == 1) {
                $student->status = 'Approved';
            } else {
                $student->status = 'Rejected';
            }
            return $student;
        });
        return view('leave.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leave.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return config.app('url');
    //    return $url = env("APP_URL") . '/hr_mail/' .  1;
       $this->validate($request, [
            'name'=> 'required',
            'email'=> 'required',
            'reason'=>'required',
            'startdate'=>'required|date',
            'enddate'=>'required|date|after:startdate'


        ]);
        
        $student = new student;
        $student->name =$request->input('name');
        $student->department =$request->input('department');
        $student->email =$request->input('email');
        $student->phone =$request->input('phone');
        $student->startdate =$request->input('startdate');
        $student->enddate =$request->input('enddate');
        $student->charge =$request->input('charge');
        $student->reason =$request->input('reason');
        $student->save();

        $url = env('APP_URL') . '/hr_mail/' .  $student->id;

        $url_decline = env('APP_URL') . '/decline/' .  $student->id;

        // return $url;



        Mail::to($request->department)->send(new leavemail($student, $url, $url_decline));
        // Mail::to($request->department)->send(new leavemail($student, $url));

        return redirect('/employee/create')->with('success', 'Your details have been submitted successfully');

    }

    public function hr_mail($id)
    {
        $student = Student::find($id);
        $url = env('APP_URL') . "/ceo_mail/" .  $student->id;
        $url_decline = env('APP_URL') . '/decline/' .  $student->id;
        Mail::to('hrm@mftfulfillmentcentre.com')->send(new Leavemail2($student, $url,  $url_decline));
        return 'submitted';

    }

    public function ceo_mail($id)
    {
        $student = Student::find($id);
        $url = env('APP_URL') . "/employee/" .  $student->id;
        $url_decline = env('APP_URL') . '/decline/' .  $student->id;
        Mail::to('victor.ouma@mftfulfillmentcentre.com')->send(new Leavemail3($student, $url,  $url_decline));
       
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $student1= student::find($id);
       return view('leave.show')->with('student1', $student1);
    }

    /**s
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    
}
