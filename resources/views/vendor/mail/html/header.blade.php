<tr>
    <td class="header">
        <a class="mail-header" href="{{ $url }}">
            @if (trim($slot) === 'Laravel')
            <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
            @else
            {{ $slot }}
            @endif
        </a>
    </td>
</tr>