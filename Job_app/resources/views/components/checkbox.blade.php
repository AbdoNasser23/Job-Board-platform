@props(['disabled' => false])

<input type="checkbox" @disabled($disabled) {{ $attributes->merge(['class' => 'rounded border-[#3A3A48] bg-[#14141C] text-[#5B8DEF] shadow-sm focus:ring-[#5B8DEF] focus:ring-offset-[#0A0A0F]']) }}>
