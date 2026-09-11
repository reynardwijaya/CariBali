<div id="favoriteCardsContainer">
  <!-- Cards -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-10 mb-6 items-start">
    @if(isset($experiences) && $experiences->count() > 0)
      @foreach($experiences as $experience)
      <div class="experience-card flex flex-col" data-category="{{ $experience->category }}" data-location="{{ $experience->location }}">
        <!-- Image -->
        <div class="w-full aspect-[16/10] rounded-2xl overflow-hidden">
          <img src="{{ asset('images/dummy/' . $experience->image) }}"
               alt="{{ $experience->title }}"
               class="w-full h-full object-cover experience-card-img">
        </div>

        <!-- Content -->
        <div class="flex flex-col pt-3">
          <!-- Title & Rating -->
          <div class="flex justify-between items-center gap-3">
            <h3 class="text-base font-semibold text-gray-900 leading-snug flex items-center gap-1.5">
              @if($experience->category && isset(\App\Models\Experience::CATEGORIES[$experience->category]))
                <span>{{ \App\Models\Experience::CATEGORIES[$experience->category]['emoji'] }}</span>
              @endif
              {{ $experience->title }}
            </h3>
            <div class="flex items-center gap-1 text-sm font-bold text-gray-900 flex-shrink-0">
              <span class="star-rating text-base">★</span>
              <span>{{ $experience->rating }}</span>
            </div>
          </div>

          <!-- Maps Link -->
          @if($experience->maps_link)
          <a href="{{ $experience->maps_link }}" target="_blank" class="maps_link_inline">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
            </svg>
            View on Maps
          </a>
          @endif

          <!-- Description -->
          <p class="text-gray-500 text-sm description-text" data-full-text="{{ $experience->description }}">
            {{ Str::limit($experience->description, 100) }}
            @if(strlen($experience->description) > 100)
              <span class="read-more-link ml-1">Read More</span>
            @endif
          </p>
        </div>
      </div>
      @endforeach
    @else
      <div class="col-span-full text-center py-12 text-gray-500">
        No experiences available at the moment.
      </div>
    @endif
  </div>

  <!-- Pagination -->
  @if(isset($experiences) && $experiences->count() > 0)
  <div class="flex justify-center items-center gap-2">
    @if($experiences->currentPage() > 1)
      <a href="{{ $experiences->previousPageUrl() }}#favorite" data-page="{{ $experiences->currentPage() - 1 }}" class="pagination-nav-btn pagination-link">Back</a>
    @else
      <span class="pagination-nav-btn disabled">Back</span>
    @endif

    <div class="flex items-center gap-1.5 mx-1">
      @for($i = 1; $i <= $experiences->lastPage(); $i++)
        <a href="{{ $experiences->url($i) }}#favorite" data-page="{{ $i }}" class="pagination-circle pagination-link {{ $i == $experiences->currentPage() ? 'active' : '' }}">
          {{ $i }}
        </a>
      @endfor
    </div>

    @if($experiences->hasMorePages())
      <a href="{{ $experiences->nextPageUrl() }}#favorite" data-page="{{ $experiences->currentPage() + 1 }}" class="pagination-nav-btn pagination-link">Next</a>
    @else
      <span class="pagination-nav-btn disabled">Next</span>
    @endif
  </div>
  @endif
</div>
