@component('mail::message')
# Leave Application Details

<table class='table-bordered'>
    <tr>
        <td scope="row"><b>Name</b></td>
        <td>{{$student['name']}}</td>
    </tr>
    <tr>
        <td scope="row"><b>Email</b></th>
        <td>{{$student['email']}}</td>
    </tr>
    <tr>
        <td scope="row"><b>Department</b></td>
        <td>{{$student['department']}}</td>
    </tr>
    <tr>
        <td scope="row"><b>Person To Take Charge</b></td>
        <td>{{$student['charge']}}</td>
    </tr>
    <tr>
        <td scope="row"><b>Start Date</b></td>
        <td>{{$student['startdate']}}</td>
    </tr>
    <tr>
        <td scope="row"><b>End Date</b></td>
        <td>{{$student['enddate']}}</td>
    </tr>
    <tr>
        <td scope="row"><b>Reason For Leave</b></td>
        <td>{{$student['reason']}}</td>
    </tr>
</table>

<table>
    <tr>
        <td>

@component('mail::button', ['url' => $url, 'color'=>'success'])
Approve
@endcomponent
        </td>
        <td>
   

@component('mail::button', ['url' => $url_decline, 'color'=>'red'])
Decline
@endcomponent
        </td>
    </tr>
</table>
{{-- <a href="{{$url}}">Click on this link to approve</a> --}}



Thanks,<br>
{{ config('app.name') }}
@endcomponent