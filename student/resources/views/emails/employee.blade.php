@component('mail::message')
# Dear {{ $student->name }}

@if ($status == 'Approved')
Your leave has been approved
        
@else
Your leave has been rejected
        
@endif


Thanks,<br>
{{ config('app.name') }}
@endcomponent
