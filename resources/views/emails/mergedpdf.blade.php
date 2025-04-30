@component('mail::message')


<h2>Hello {{ $document->emp_name }},</h2>
<p>{{ $messageText }}</p>

<!-- <p><strong>Employee ID:</strong> {{ $document->emp_id }}</p>
<p><strong>Department:</strong> {{ $document->department }}</p>
<p><strong>Status:</strong> {{ $status }}</p> -->

Thanks,<br>
{{ $user->name }}, <br>
@endcomponent
