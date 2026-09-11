<style>
.faq-icon-circle {
  width: 32px;
  height: 32px;
  border-radius: 9999px;
  border: 1px solid #e5e7eb;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  transition: border-color 0.2s ease, background-color 0.2s ease;
}
.faq-toggle[aria-expanded="true"] .faq-icon-circle {
  border-color: #f97316;
  background-color: #fff7ed;
}
</style>

<!-- FAQ Section -->
<section id="faq" class="pt-6 pb-10 bg-white text-center">
  <div class="max-w-3xl mx-auto px-6">
    <div class="mb-8">
      <h2 class="text-2xl md:text-3xl font-semibold text-gray-900 leading-tight mb-0">
        Frequently Asked Questions
      </h2>
      <p class="text-sm md:text-base text-gray-500 mt-0">
        Got a question? We’ve got answers to help you explore Bali with confidence.
      </p>
    </div>

    <div class="space-y-4">
      <!-- FAQ 1 -->
      <div class="border border-gray-200 rounded-xl">
        <button
          class="w-full flex justify-between items-center px-6 py-4 text-left text-gray-900 font-medium text-lg focus:outline-none faq-toggle"
          aria-expanded="false"
        >
          <span>How does CariBali recommend destinations to me?</span>
          <span class="faq-icon-circle">
            <span class="faq-icon text-orange-500 text-base leading-none">+</span>
          </span>
        </button>
        <div class="faq-content hidden px-6 pb-4 text-gray-600">
          CariBali uses your interests, travel preferences, and current location to suggest destinations
          that match your style. Our smart system filters data to show you places that align with your
          travel style, making it easier to find places you'll truly enjoy.
        </div>
      </div>

      <!-- FAQ 2 -->
      <div class="border border-gray-200 rounded-xl">
        <button
          class="w-full flex justify-between items-center px-6 py-4 text-left text-gray-900 font-medium text-lg focus:outline-none faq-toggle"
          aria-expanded="false"
        >
          <span>Do I need to turn on my GPS to get recommendations?</span>
          <span class="faq-icon-circle">
            <span class="faq-icon text-orange-500 text-base leading-none">+</span>
          </span>
        </button>
        <div class="faq-content hidden px-6 pb-4 text-gray-600">
          While GPS access enhances location-based recommendations, you can still explore curated lists and
          top-rated destinations without turning it on.
        </div>
      </div>

      <!-- FAQ 3 -->
      <div class="border border-gray-200 rounded-xl">
        <button
          class="w-full flex justify-between items-center px-6 py-4 text-left text-gray-900 font-medium text-lg focus:outline-none faq-toggle"
          aria-expanded="false"
        >
          <span>What types of destinations are included?</span>
          <span class="faq-icon-circle">
            <span class="faq-icon text-orange-500 text-base leading-none">+</span>
          </span>
        </button>
        <div class="faq-content hidden px-6 pb-4 text-gray-600">
          Our recommendations include beaches, temples, restaurants, adventure activities, and hidden gems
          across Bali curated from traveler reviews and local insights.
        </div>
      </div>

      <!-- FAQ 4 -->
      <div class="border border-gray-200 rounded-xl">
        <button
          class="w-full flex justify-between items-center px-6 py-4 text-left text-gray-900 font-medium text-lg focus:outline-none faq-toggle"
          aria-expanded="false"
        >
          <span>Is the information about the places accurate and up to date?</span>
          <span class="faq-icon-circle">
            <span class="faq-icon text-orange-500 text-base leading-none">+</span>
          </span>
        </button>
        <div class="faq-content hidden px-6 pb-4 text-gray-600">
          Yes, CariBali regularly updates its database using the latest local data sources and traveler
          feedback to ensure information remains accurate and relevant.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ Toggle Script -->
<script>
  document.querySelectorAll(".faq-toggle").forEach((btn) => {
    btn.addEventListener("click", () => {
      const content = btn.nextElementSibling;
      const icon = btn.querySelector(".faq-icon");
      const isOpen = !content.classList.contains("hidden");

      // Tutup semua FAQ lain
      document.querySelectorAll(".faq-content").forEach((el) => el.classList.add("hidden"));
      document.querySelectorAll(".faq-icon").forEach((ic) => (ic.textContent = "+"));
      document.querySelectorAll(".faq-toggle").forEach((b) => b.setAttribute("aria-expanded", "false"));

      // Toggle konten yang diklik
      if (!isOpen) {
        content.classList.remove("hidden");
        icon.textContent = "×";
        btn.setAttribute("aria-expanded", "true");
      }
    });
  });
</script>
