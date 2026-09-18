@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm font-medium text-[#C7C7D1] mb-1.5']) }}>
    {{ $value ?? $slot }}
</label>
