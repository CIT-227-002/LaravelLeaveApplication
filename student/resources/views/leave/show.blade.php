@extends('layouts.app')
@section('content')
<h3>Leave Application Details</h3>

<table class="table table-bordered">
    <tr>
        
    
        <th>Name</th>
    
        <th>Department</th>
    
        <th>Email</th>
   
        <th>Phone</th>
   
        <th>From</th>
    
        <th>To</th>
   
        <th>Person to take charge</th>
    
        <th>Reason</th>
    </tr>
 
    
    <tr>
        
   
        <td>{{$student1->name}}</td>
    
        <td>{{$student1->department}}</td>
    
        <td>{{$student1->email}}</td>
    
        <td>{{$student1->phone}}</td>
    
        <td>{{$student1->startdate}}</td>
    
        <td>{{$student1->enddate}}</td>
    
        <td>{{$student1->charge}}</td>
    
        <td>{{$student1->reason}}</td>
    </tr>
 
        
    
</table>   

<a href="/employee" class="btn btn-default" >Back</a>
<a href="{{route('employee.approve', $student1->id)}}" class="btn btn-success">Approve</a> 
<a href="{{route('employee.decline', $student1->id)}}" class="btn btn-danger">Decline</a>  




@endsection