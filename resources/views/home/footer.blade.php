<!-- Footer Section -->
<footer class="bg-white border-t border-gray-200 w-screen relative left-1/2 right-1/2 -translate-x-1/2">
  <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4 px-4 md:px-8 lg:px-12 py-6 mx-auto max-w-[1600px]">
    <!-- Logo -->
    <div class="flex items-center justify-center md:justify-start">
      <img src="{{ asset('images/logofoot.png') }}" alt="CariBali Footer Logo" class="h-7 w-auto">
    </div>

    <!-- Navigation Links -->
    <nav class="flex flex-wrap items-center justify-center gap-x-6 gap-y-2 text-gray-800 font-medium text-sm">
      <a href="/" class="hover:text-orange-500 transition">Home</a>
      <a href="#favorite" class="hover:text-orange-500 transition">Favorite Places</a>
      <a href="#whychooseus" class="hover:text-orange-500 transition">Why Choose Us?</a>
      <a href="#testimonials" class="hover:text-orange-500 transition">Testimonial</a>
      <a href="#faq" class="hover:text-orange-500 transition">FAQ</a>
    </nav>

    <!-- Explore Button -->
    <div class="flex items-center justify-center md:justify-end">
      <a href="#favorite"
         class="inline-flex items-center border border-gray-300 rounded-full px-5 py-3 text-gray-800 text-sm font-medium hover:bg-gray-100 transition">
        Explore Destination
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
             stroke-width="2" stroke="#f97316" class="w-4 h-4 ml-2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
      </a>
    </div>
  </div>

  <!-- Divider -->
  <hr class="border-gray-200">

  <!-- Bottom Footer -->
  <div class="flex items-center justify-center text-gray-600 text-sm px-4 md:px-8 lg:px-12 py-5 mx-auto max-w-[1600px]">
    <div class="flex flex-wrap items-center justify-center gap-x-4 gap-y-2 text-center">
      <a href="#" class="hover:text-orange-500 transition">Terms of Use</a>
      <a href="#" class="hover:text-orange-500 transition">Privacy Policy</a>
      <span>© 2025 CariBali Developer. All Rights Reserved</span>
    </div>
  </div>
</footer>
