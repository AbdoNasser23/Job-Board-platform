@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full rounded-lg border border-[#2A2A38] bg-[#14141C] px-3.5 py-2.5 text-sm text-[#F2F2F5] placeholder-[#5C5C6E] shadow-sm focus:border-[#5B8DEF] focus:ring-1 focus:ring-[#5B8DEF] focus:outline-none transition-colors disabled:opacity-50']) }}>
