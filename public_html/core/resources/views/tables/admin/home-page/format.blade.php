@php
$nameWithoutDot = ucfirst(str_replace('.', ' ', $row));
$name = str_replace('_', ' ', $nameWithoutDot);
@endphp

{{ $name }}
