<style>
.carousel_nav_btn {
  width: 44px;
  height: 44px;
  border-radius: 9999px;
  background: #ffffff;
  border: 1px solid #e5e7eb;
  box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
  color: #374151;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all 0.2s ease;
}
.carousel_nav_btn:hover {
  background: #f97316;
  border-color: #f97316;
  color: #ffffff;
  transform: translateY(-1px);
  box-shadow: 0 8px 20px rgba(249, 115, 22, 0.25);
}
.carousel_nav_btn:active {
  transform: translateY(0);
}
.explore_card {
  transition: transform 0.35s ease, box-shadow 0.35s ease;
}
.explore_card:hover {
  transform: translateY(-4px);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.16);
}
.explore_card_img {
  transition: transform 0.6s ease;
}
.explore_card:hover .explore_card_img {
  transform: scale(1.06);
}
.explore_card_badge {
  background: rgba(255, 255, 255, 0.18);
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
  border: 1px solid rgba(255, 255, 255, 0.3);
}
.testimonial_card {
  width: 80%;
  flex: 0 0 auto;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
  transition: box-shadow 0.25s ease, transform 0.25s ease;
}
@media (min-width: 640px) {
  .testimonial_card { width: 44%; }
}
@media (min-width: 1024px) {
  .testimonial_card { width: 30%; }
}
.testimonial_card:hover {
  box-shadow: 0 12px 28px rgba(0, 0, 0, 0.08);
  transform: translateY(-2px);
}
.testimonial_header {
  display: flex;
  align-items: center;
  gap: 10px;
}
.testimonial_avatar {
  width: 36px;
  height: 36px;
  border-radius: 9999px;
  object-fit: cover;
  flex-shrink: 0;
  display: block;
}
.testimonial_info {
  flex: 1;
  min-width: 0;
}
.testimonial_name {
  margin: 0;
  font-size: 14px;
  font-weight: 600;
  color: #111827;
  line-height: 1.25;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.testimonial_role {
  margin: 1px 0 0 0;
  font-size: 12px;
  color: #6b7280;
  line-height: 1.25;
}
.testimonial_rating {
  display: flex;
  align-items: center;
  gap: 3px;
  font-size: 13px;
  font-weight: 600;
  color: #fb923c;
  flex-shrink: 0;
  margin-left: 8px;
}
.testimonial_text {
  margin: 10px 0 0 0;
  padding-top: 10px;
  border-top: 1px solid #f0f0f0;
  font-size: 13px;
  color: #4b5563;
  line-height: 1.5;
}
</style>

<div class="blog_section layout_padding pt-4 bg-white w-full relative overflow-visible">
  <div class="px-6 py-10 max-w-7xl mx-auto">

    <!-- Section Header (kiri) -->
    <div class="flex flex-col md:flex-row items-center md:items-end justify-between mb-6 gap-4 text-center md:text-left">
      <div>
        <h2 class="text-2xl md:text-3xl font-semibold text-gray-900 leading-tight mb-0">Explore Bali</h2>
        <p class="text-sm md:text-base text-gray-500 mt-0 whitespace-nowrap">
          Discover exciting activities and breathtaking destinations around the island.
        </p>
      </div>

      <!-- Navigation + Page Indicator -->
      <div class="flex items-center gap-3 flex-shrink-0">
        <button id="prevSlideFloating"
                class="carousel_nav_btn">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
               stroke-width="2" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M15.75 19.5L8.25 12l7.5-7.5" />
          </svg>
        </button>

        <span id="pageIndicator" class="text-gray-500 text-sm font-medium tabular-nums">1 / 2</span>

        <button id="nextSlideFloating"
                class="carousel_nav_btn">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
               stroke-width="2" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M8.25 4.5l7.5 7.5-7.5 7.5" />
          </svg>
        </button>
      </div>
    </div>

    <!-- Carousel Container -->
    <div class="relative w-full">
      <div id="carouselContainer"
           class="flex space-x-6 overflow-x-hidden scroll-smooth snap-x snap-mandatory">
        @foreach ([ 
          ['title' => 'Private Sightseeing Tours', 'category' => 'Activities', 'price' => 'From IDR 296,963', 'image' => 'images/tour.jpeg'],
          ['title' => 'Uluwatu Temple (Pura Luhur Uluwatu)', 'category' => 'Attractions', 'price' => 'From IDR 435,603', 'image' => 'images/uluwatu.jpg'],
          ['title' => '4WD Tours', 'category' => 'Activities', 'price' => 'From IDR 407,264', 'image' => 'images/4wd.jpg'],
          ['title' => 'Mountain Bike Tours', 'category' => 'Activities', 'price' => 'From IDR 500,000', 'image' => 'images/mountain.jpg'],
          ['title' => 'Scuba Diving', 'category' => 'Activities', 'price' => 'From IDR 1,086,037', 'image' => 'images/diving.webp'],
          ['title' => 'White Water Rafting', 'category' => 'Activities', 'price' => 'From IDR 458,172', 'image' => 'images/rafting.jpeg']
        ] as $activity)
        <div class="explore_card relative min-w-[90%] sm:min-w-[48%] md:min-w-[23%] snap-start rounded-[28px] overflow-hidden">
          <!-- Image -->
          <img src="{{ asset($activity['image']) }}" alt="{{ $activity['title'] }}"
               class="explore_card_img w-full h-[360px] object-cover">

          <!-- Overlay -->
          <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent"></div>

          <!-- Category -->
          <div class="absolute top-4 left-4">
            <span class="explore_card_badge text-white text-xs px-3 py-1.5 rounded-full font-medium">
              {{ $activity['category'] }}
            </span>
          </div>

          <!-- Text -->
          <div class="absolute bottom-5 left-5 right-5 text-white">
            <h3 class="text-lg font-semibold mb-1 leading-snug text-white">{{ $activity['title'] }}</h3>
            <p class="text-sm text-white/85 font-medium">{{ $activity['price'] }}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

<!-- Carousel Script -->
<script>
  function initSnapCarousel(containerId, prevId, nextId, indicatorId) {
    const container = document.getElementById(containerId);
    const prevButton = document.getElementById(prevId);
    const nextButton = document.getElementById(nextId);
    const indicator = document.getElementById(indicatorId);
    if (!container || !prevButton || !nextButton || !indicator) return;

    let currentPage = 1;
    let totalPages = Math.ceil(container.scrollWidth / container.clientWidth);

    const updateIndicator = () => {
      totalPages = Math.ceil(container.scrollWidth / container.clientWidth);
      indicator.textContent = `${currentPage} / ${totalPages}`;
    };

    const scrollCarousel = (direction) => {
      const scrollAmount = container.clientWidth;
      container.scrollBy({ left: direction * scrollAmount, behavior: "smooth" });

      // Update indicator after scroll
      setTimeout(() => {
        const scrollLeft = container.scrollLeft;
        const maxScroll = container.scrollWidth - container.clientWidth;
        currentPage = maxScroll > 0 ? Math.round((scrollLeft / maxScroll) * totalPages) + 1 : 1;
        currentPage = Math.max(1, Math.min(currentPage, totalPages));
        updateIndicator();
      }, 500);
    };

    prevButton.addEventListener("click", () => scrollCarousel(-1));
    nextButton.addEventListener("click", () => scrollCarousel(1));

    updateIndicator();
    window.addEventListener("resize", updateIndicator);
  }

  document.addEventListener("DOMContentLoaded", () => {
    initSnapCarousel("carouselContainer", "prevSlideFloating", "nextSlideFloating", "pageIndicator");
    initSnapCarousel("testimonialCarouselContainer", "prevTestimonial", "nextTestimonial", "testimonialPageIndicator");
  });
</script>


<!-- Testimonials Section -->
<section id="blog" class="pt-6 pb-10 bg-white">
  <div class="max-w-7xl mx-auto px-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row items-center md:items-end justify-between mb-6 gap-4 text-center md:text-left">
      <div>
        <h2 class="text-2xl md:text-3xl font-semibold text-gray-900 leading-tight mb-0">
          What Travelers Are Saying
        </h2>
        <p class="text-sm md:text-base text-gray-500 mt-0">
          Real stories from explorers who found their perfect Bali experience through CariBali.
        </p>
      </div>

      <!-- Navigation + Page Indicator -->
      <div class="flex items-center gap-3 flex-shrink-0">
        <button id="prevTestimonial" class="carousel_nav_btn">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
               stroke-width="2" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
          </svg>
        </button>

        <span id="testimonialPageIndicator" class="text-gray-500 text-sm font-medium tabular-nums">1 / 2</span>

        <button id="nextTestimonial" class="carousel_nav_btn">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
               stroke-width="2" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
          </svg>
        </button>
      </div>
    </div>

    <!-- Testimonials Carousel -->
    <div class="relative w-full">
      <div id="testimonialCarouselContainer"
           class="flex gap-6 overflow-x-hidden scroll-smooth snap-x snap-mandatory">
        @foreach ([
          ['name' => 'Olivia Maxwell', 'role' => 'American Tourist', 'rating' => '4.7', 'image' => 'images/t1.png', 'text' => "CariBali helped me find places that I wouldn’t have discovered on my own. The recommendations felt personal and really matched my preferences."],
          ['name' => 'Sofia Martinez', 'role' => 'Spanish Photographer', 'rating' => '4.8', 'image' => 'images/t2.jpeg', 'text' => "CariBali introduced me to hidden beaches and vibrant markets I would’ve never found. Every suggestion felt like it was made just for me."],
          ['name' => 'Max Chen', 'role' => 'Food Blogger', 'rating' => '4.5', 'image' => 'images/t3.png', 'text' => "From street food stalls to fine dining, CariBali nailed every recommendation. It was like traveling with a local friend."],
          ['name' => 'Amara Patel', 'role' => 'Indian Travel Writer', 'rating' => '4.9', 'image' => 'images/t4.jpeg', 'text' => "I discovered cultural gems and quiet retreats that made my trip unforgettable. CariBali truly understands a traveler’s heart."],
          ['name' => "Liam O'Connor", 'role' => 'Australian Surfer', 'rating' => '4.7', 'image' => 'images/t5.jpeg', 'text' => "The app showed me the best surfing spots that weren’t crowded. Now, it’s my go-to for planning adventures in Bali."],
          ['name' => 'Hana Kim', 'role' => 'Korean Tourist', 'rating' => '4.8', 'image' => 'images/t6.png', 'text' => "I loved the cozy cafes and co-working spaces that CariBali recommended. They were perfect for mixing work and exploration."]
        ] as $t)
        <div class="testimonial_card snap-start rounded-2xl p-4 bg-white">
          <!-- Header -->
          <div class="testimonial_header">
            <img src="{{ asset($t['image']) }}" alt="{{ $t['name'] }}" class="testimonial_avatar">
            <div class="testimonial_info">
              <h3 class="testimonial_name">{{ $t['name'] }}</h3>
              <p class="testimonial_role">{{ $t['role'] }}</p>
            </div>
            <div class="testimonial_rating">
              <span>★</span>{{ $t['rating'] }}
            </div>
          </div>

          <!-- Text -->
          <p class="testimonial_text">
            {{ $t['text'] }}
          </p>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
