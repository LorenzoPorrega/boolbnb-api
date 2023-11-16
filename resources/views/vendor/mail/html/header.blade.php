@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('boolbnb-logo-favicon.png')}}" class="logo" alt="Laravel Logo" style="width: 60px">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
