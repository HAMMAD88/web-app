@component('mail::message')
# Hello, {{ $post->user->name }}

Someone just {{ $reaction }}d your post:

"{{ $post->text }}"

Thanks,<br>
{{ config('app.name') }}
@endcomponent

