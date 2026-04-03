@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
    <img src="https://www.linkscircle.com/images/logo.png" class="logo" alt="LinksCircle Affiliate Network">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
