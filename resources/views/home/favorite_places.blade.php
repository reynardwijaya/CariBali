<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdn.tailwindcss.com"></script>

<style>
.star-rating {
  color: #fbbf24;
}
.post-card-img {
  transition: transform 0.4s ease;
}
.post-card:hover .post-card-img {
  transform: scale(1.05);
}
.maps_link_inline {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  width: fit-content;
  font-size: 12px;
  font-weight: 500;
  color: #f97316;
  margin-top: 4px;
  transition: color 0.2s ease;
}
.maps_link_inline:hover {
  color: #ea580c;
}
.description-text {
  margin-top: 0.375rem;
  line-height: 1.5;
}
.read-more-link {
  color: #f97316;
  font-weight: 500;
  cursor: pointer;
}
.read-more-link:hover {
  color: #ea580c;
}
.category_pill {
  border: 1px solid #e5e7eb;
  color: #4b5563;
  background: #ffffff;
  font-size: 14px;
  font-weight: 500;
  padding: 7px 18px;
  border-radius: 9999px;
  cursor: pointer;
  transition: all 0.2s ease;
}
.category_pill:hover {
  border-color: #fdba74;
  color: #f97316;
}
.category_pill.active {
  background: #f97316;
  border-color: #f97316;
  color: #ffffff;
}
.pagination-circle {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 1px solid #d1d5db;
  cursor: pointer;
  transition: all 0.3s ease;
  font-size: 14px;
  color: #4b5563;
}
.pagination-circle.active {
  background-color: #f97316;
  color: white;
  border-color: #f97316;
}
.pagination-nav-btn {
  padding: 7px 16px;
  border-radius: 9999px;
  border: 1px solid #d1d5db;
  color: #6b7280;
  background-color: white;
  font-size: 14px;
  transition: all 0.3s ease;
}
.pagination-nav-btn:hover {
  border-color: #9ca3af;
  color: #374151;
}
.pagination-nav-btn.disabled {
  opacity: 0.5;
  pointer-events: none;
}
</style>

<!-- Favorite Places Section -->
<div id="favorite" class="services_section bg-white pt-48 pb-10">
  <div class="container mx-auto px-6">
    <!-- Title -->
    <div class="text-center mb-6">
      <h1 class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight mb-0">
        Discover places you're going to love
      </h1>
      <p class="text-sm md:text-base text-gray-500 max-w-3xl mx-auto mt-0">
        From cultural wonders to nature escapes, let what you love point you toward Bali's most amazing experiences.
      </p>
    </div>

    <!-- Category Filters -->
    @if(isset($posts) && $posts->count() > 0)
    <div class="flex flex-wrap justify-center gap-2 mb-10" id="categoryFilters">
      <button type="button" class="category_pill active" data-filter="all">All</button>
      @foreach(\App\Models\Post::CATEGORIES as $key => $cat)
        <button type="button" class="category_pill" data-filter="{{ $key }}">{{ $cat['emoji'] }} {{ $cat['label'] }}</button>
      @endforeach
    </div>
    @endif

    @include('home._favorite_cards', ['posts' => $posts ?? null])
  </div>
</div>

<script>
(function () {
  function bindReadMore(scope) {
    scope.querySelectorAll('.read-more-link').forEach(function (link) {
      link.addEventListener('click', function toggle(e) {
        e.preventDefault();
        var desc = link.closest('.description-text');
        var fullText = desc.getAttribute('data-full-text');

        if (link.textContent === 'Read More') {
          desc.innerHTML = fullText + ' <span class="read-more-link">Read Less</span>';
        } else {
          var truncated = fullText.length > 100 ? fullText.substring(0, 100) + '...' : fullText;
          desc.innerHTML = truncated + (fullText.length > 100 ? ' <span class="read-more-link">Read More</span>' : '');
        }

        var newLink = desc.querySelector('.read-more-link');
        if (newLink) newLink.addEventListener('click', toggle);
      });
    });
  }

  var activeLocationFilter = 'all';

  function applyActiveFilter() {
    var activePill = document.querySelector('.category_pill.active');
    var categoryFilter = activePill ? activePill.getAttribute('data-filter') : 'all';
    document.querySelectorAll('.post-card').forEach(function (card) {
      var categoryMatch = categoryFilter === 'all' || card.getAttribute('data-category') === categoryFilter;
      var locationMatch = activeLocationFilter === 'all' || card.getAttribute('data-location') === activeLocationFilter;
      card.style.display = (categoryMatch && locationMatch) ? '' : 'none';
    });
  }

  // Allows the hero search bar (banner.blade.php) to filter Favorite Places by location.
  window.setFavoriteLocationFilter = function (value) {
    activeLocationFilter = value || 'all';
    applyActiveFilter();
  };

  function bindPagination() {
    var container = document.getElementById('favoriteCardsContainer');
    if (!container) return;

    container.querySelectorAll('.pagination-link').forEach(function (link) {
      link.addEventListener('click', function (e) {
        e.preventDefault();
        var url = link.getAttribute('href');

        fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
          .then(function (res) { return res.text(); })
          .then(function (html) {
            var parser = new DOMParser();
            var doc = parser.parseFromString(html, 'text/html');
            var newContainer = doc.getElementById('favoriteCardsContainer');
            if (!newContainer) return;

            var current = document.getElementById('favoriteCardsContainer');
            current.replaceWith(newContainer);

            bindReadMore(newContainer);
            bindPagination();
            applyActiveFilter();
          });
      });
    });
  }

  document.addEventListener('DOMContentLoaded', function () {
    bindReadMore(document);
    bindPagination();

    // Category filter (current page only)
    var pills = document.querySelectorAll('.category_pill');
    pills.forEach(function (pill) {
      pill.addEventListener('click', function () {
        pills.forEach(function (p) { p.classList.remove('active'); });
        pill.classList.add('active');
        applyActiveFilter();
      });
    });
  });
})();
</script>
