@extends('layouts.app')
@section('content')

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> LEAVE APPLICATION DATA</b></h5>
  </header>
{{-- <h3>LEAVE APPLICATION DATA</h3> --}}
<table class="table table-borders">
    <tr>
        <th> Name</th>
        <th>Email</th>
        <th>From</th>
        <th>To</th>
        <th>Reason</th>
        <th>Status</th>
    </tr>
  @if (count($students) > 0)
    @foreach ($students as $student )
     <tr>
         <td>{{$student->name}}</td>
         <td><a href="/employee/{{$student->id}}">{{$student->email}}</a></td>
         <td>{{$student->startdate}}</td>
         <td>{{$student->enddate}}</td>
         <td>{{$student->reason}}</td>
         <td>{{$student->status}}</td>
     </tr>
         
        
    @endforeach


  @else
    
  @endif
</table>   
@endsection