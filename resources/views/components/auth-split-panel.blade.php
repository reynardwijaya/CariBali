@props(['eyebrow' => null, 'heading' => null])

<x-guest-layout>
    <div class="min-h-screen w-full flex">
        <!-- Left: background showcase -->
        <div class="hidden lg:flex lg:w-3/5 relative overflow-hidden">
            <img src="{{ asset('images/auth-background.png') }}" alt="Bali"
                 class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/10"></div>

            <div class="relative z-10 flex flex-col justify-between w-full p-12 xl:p-16">
                <div class="flex items-center">
                    <img src="{{ asset('images/Logo.png') }}" alt="CariBali" class="h-10 w-auto">
                </div>

                <div>
                    <h1 class="text-white text-5xl font-bold mb-5 leading-tight">Discover Your Bali</h1>
                    <p class="text-white/90 text-lg max-w-md mb-8 leading-relaxed">
                        Discover the best destinations, immerse yourself in vibrant cultures, and enjoy
                        unforgettable experiences that perfectly match your travel style.
                    </p>
                    <div class="flex items-center gap-2">
                        <span class="h-1.5 w-8 rounded-full bg-white"></span>
                        <span class="h-1.5 w-4 rounded-full bg-white/40"></span>
                        <span class="h-1.5 w-4 rounded-full bg-white/40"></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right: form panel -->
        <div class="w-full lg:w-2/5 flex items-center justify-center bg-white px-6 py-12 sm:px-12 lg:rounded-l-[2rem] lg:shadow-2xl lg:-ml-8 relative z-10">
            <div class="w-full max-w-sm">
                @if($eyebrow)
                    <p class="text-xs font-semibold tracking-widest text-gray-400 uppercase mb-2">{{ $eyebrow }}</p>
                @endif
                @if($heading)
                    <h2 class="text-3xl font-bold text-gray-900 mb-8">{{ $heading }}</h2>
                @endif

                {{ $slot }}
            </div>
        </div>
    </div>
</x-guest-layout>
