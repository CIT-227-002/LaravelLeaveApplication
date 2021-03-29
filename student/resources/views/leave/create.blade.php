@extends('layouts.app')
@section('content')
<html>
    <head>
      <script type="text/javascript">
      function LeaveDays(){
        var stdate= new Date(document.getElementById("start_date").value);
        var endate= new Date(document.getElementById("end_date").value);
        return parseInt((endate - stdate)/(24 * 3600 * 1000));
      }

      function cal(){
        if((document.getElementById("stdate"))&&(document.getElementById("endate"))) {
          document.getElementById("days").value=LeaveDays();

          
        }

      }
      </script>

    </head>
    <body>
        <div class="container">

          <form method="POST" action="{{ route('employee.store') }}">
        @csrf
        <div class="row">
          <div class="form-group col-8">

    

          <label>Name</label>
  
          <input type="text" class="form-control" name="name" placeholder="enter your name">
        </div>
      </div>
      <div class="row">
      <div class="form-group col-8"> 
        <label>Department</label>
        <select name="department" class="form-control">
            <option disabled="disabled" selected="selected">Department</option>
                    <option value="business@mftfulfillment.com">Business Development</option>
                    <option value="beverly.mft@gmail.com">Customer Care</option>
                    <option value="godwins.juma@speedballcourier.com">Finance</option>
                    <option value="don.awene@mftfulfillmentcentre.com">IT</option>
                    <option value="operationske@mftfulfillmentcentre.com">Operations</option>
                    <option value="operationske@mftfulfillmentcentre.com">Transport</option>
                    <option value="operationske@mftfulfillmentcentre.com">Warehouse</option>
        </select>
     </div>
    </div>
    <div class="row">
      
          <div  class="form-group col-8">
            <label>Email</label>
              <input type="email" name="email" class="form-control" placeholder="name@example.com">
          </div>
  
  </div>
  <div class="row">
    
        <div  class="form-group col-8">
          <label>Phone</label>
            <input type="text" name="phone" class="form-control" placeholder="address">
        </div>

</div>
<div class="row">
    
  <div  class="form-group col-3">
    <label>From</label>
      <input type="date" id="start_date" name="startdate" class="form-control" onchange="cal()" >
  </div>
  <div  class="form-group col-3">
    <label>To</label>
      <input type="date" id="end_date" name="enddate" class="form-control" onchange="cal()" >
  </div>
  <div  class="form-group col-2">
    <label>Days</label>
      <input type="text" id="days" name="days" class="form-control" >
  </div>


</div>
<div class="row">
    
  <div  class="form-group col-8">
    <label>Person to take charge</label>
     <textarea name="charge" class="form-control" placeholder="please enter"></textarea>
  </div>

</div>
<div class="row">
  
  <div class="form-group col-8">
    <label>Reason For Leave</label>
      <select name="reason" class="form-control">

          <option disabled="disabled" selected="selected">--choose one</option>
          <option>Annual Leave</option>
          <option>Compassionate Leave</option>
          <option>Emergency Leave</option>
          <option>Maternity Leave</option>
          <option>Sick Leave</option>
      </select>



  </div>
</div>
<div class="row">
  <div class="form-group col-4">

      <button type="submit" class="btn btn-primary" name="button" >Request Leave</button>
  </div>
</div>

      </form>
    </body>

</html>
    
@endsection