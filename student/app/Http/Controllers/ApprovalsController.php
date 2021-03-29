<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\StudentController;
use App\Mail\Employee;

class ApprovalsController extends Controller
{
    public function approve($id){
        $student1 = student::findOrFail($id);
        $student1->status = 1; 
        $student1->save();
        mail::to($student1->email)->send(new Employee($student1, 'Approved'));
        return redirect('/employee')->with('status','Approved');

    }

    public function decline($id){
        $student1 = student::findOrFail($id);
        $student1->status = 2; 
        $student1->save();
        mail::to($student1->email)->send(new Employee($student1, 'Rejected'));
        return redirect('/employee')->with('status','Rejected');


    }
}
