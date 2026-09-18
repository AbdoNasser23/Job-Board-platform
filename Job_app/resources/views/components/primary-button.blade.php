<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full inline-flex justify-center items-center rounded-full bg-[#5B8DEF] px-4 py-2.5 text-sm font-semibold text-[#0A0A0F] hover:bg-[#4874D1] focus:outline-none focus:ring-2 focus:ring-[#5B8DEF] focus:ring-offset-2 focus:ring-offset-[#0A0A0F] transition-colors disabled:opacity-50']) }}>
    {{ $slot }}
</button>
