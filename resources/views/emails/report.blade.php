@component('mail::message')
# Your CBC report is ready.

check your report here, {{$file_url}}.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
