@props(['messages'])

@if(!empty($messages))
    <ul {{ $attributes->class(['text-sm text-red-600 space-y-1']) }}>
        @foreach((array) $messages as $msg)
            <li>{{ $msg }}</li>
        @endforeach
    </ul>
@endif