@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'mt-1.5 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li class="text-sm text-[#F87171]">{{ $message }}</li>
        @endforeach
    </ul>
@endif
