<div class="banner_section layout_padding">
    <div class="container">
        <h1 class="modern_banner_title">
            Uncover the Bali That Matches You
        </h1>
        <p class="modern_banner_text" id="heroTagline">
            From hidden gems nestled away from the usual tourist trails to iconic landmarks that
            define Bali, every recommendation is thoughtfully tailored to match your travel style.
        </p>

        <div class="modern_search_bar" id="heroSearchBar">
            <div class="search_field" data-dropdown>
                <i class="fa fa-map-marker search_icon" aria-hidden="true"></i>
                <button type="button" class="dropdown_toggle" data-dropdown-toggle>
                    <span class="dropdown_label" data-dropdown-label>Pick a location to explore . . . .</span>
                </button>
                <i class="fa fa-chevron-down chevron_icon" aria-hidden="true"></i>
                <div class="dropdown_panel" data-dropdown-panel>
                    <button type="button" class="dropdown_option" data-value="ubud">Ubud</button>
                    <button type="button" class="dropdown_option" data-value="kuta">Kuta</button>
                    <button type="button" class="dropdown_option" data-value="seminyak">Seminyak</button>
                    <button type="button" class="dropdown_option" data-value="uluwatu">Uluwatu</button>
                    <button type="button" class="dropdown_option" data-value="canggu">Canggu</button>
                </div>
                <input type="hidden" name="location" data-dropdown-input>
            </div>

            <span class="search_divider"></span>

            <div class="search_field" data-dropdown>
                <button type="button" class="dropdown_toggle" data-dropdown-toggle>
                    <span class="dropdown_label" data-dropdown-label>What kind of places do you like?</span>
                </button>
                <i class="fa fa-chevron-down chevron_icon" aria-hidden="true"></i>
                <div class="dropdown_panel" data-dropdown-panel>
                    @foreach (\App\Models\Experience::CATEGORIES as $key => $cat)
                        <button type="button" class="dropdown_option" data-value="{{ $key }}">{{ $cat['emoji'] }} {{ $cat['label'] }}</button>
                    @endforeach
                </div>
                <input type="hidden" name="category" data-dropdown-input>
            </div>

            <button type="button" id="heroSearchReset" class="search_reset_btn" aria-label="Reset filters">
                <i class="fa fa-times" aria-hidden="true"></i>
            </button>

            <button type="button" id="heroSearchSubmit" class="search_submit_btn" aria-label="Search">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</div>

<script>
(function () {
    var bar = document.getElementById('heroSearchBar');
    if (!bar) return;

    var dropdowns = bar.querySelectorAll('[data-dropdown]');
    var defaultLabels = [];

    function closeAll() {
        dropdowns.forEach(function (d) { d.classList.remove('open'); });
    }

    dropdowns.forEach(function (dropdown) {
        var toggle = dropdown.querySelector('[data-dropdown-toggle]');
        var label = dropdown.querySelector('[data-dropdown-label]');
        var input = dropdown.querySelector('[data-dropdown-input]');
        var panel = dropdown.querySelector('[data-dropdown-panel]');

        defaultLabels.push(label.textContent.trim());

        toggle.addEventListener('click', function (e) {
            e.stopPropagation();
            var isOpen = dropdown.classList.contains('open');
            closeAll();
            if (!isOpen) {
                dropdown.classList.add('open');
            }
        });

        panel.querySelectorAll('[data-value]').forEach(function (option) {
            option.addEventListener('click', function (e) {
                e.stopPropagation();
                label.textContent = option.textContent.trim();
                label.classList.add('has_value');
                input.value = option.getAttribute('data-value');
                closeAll();
            });
        });
    });

    document.addEventListener('click', closeAll);

    var searchBtn = document.getElementById('heroSearchSubmit');
    var categoryInput = bar.querySelector('[data-dropdown] input[name="category"]');
    var locationInput = bar.querySelector('[data-dropdown] input[name="location"]');

    if (searchBtn) {
        searchBtn.addEventListener('click', function () {
            var target = document.getElementById('favorite');
            if (!target) {
                window.location.href = '{{ url('/#favorite') }}';
                return;
            }

            var offsetTop = target.getBoundingClientRect().top + window.scrollY - 80;
            window.scrollTo({ top: offsetTop, behavior: 'smooth' });

            var categoryValue = categoryInput ? categoryInput.value : '';
            var locationValue = locationInput ? locationInput.value : '';

            if (typeof window.setFavoriteLocationFilter === 'function') {
                window.setFavoriteLocationFilter(locationValue);
            }

            setTimeout(function () {
                var selector = categoryValue
                    ? '.category_pill[data-filter="' + categoryValue + '"]'
                    : '.category_pill[data-filter="all"]';
                var pill = document.querySelector(selector);
                if (pill) pill.click();
            }, 500);
        });
    }

    var resetBtn = document.getElementById('heroSearchReset');
    if (resetBtn) {
        resetBtn.addEventListener('click', function () {
            dropdowns.forEach(function (dropdown, i) {
                var label = dropdown.querySelector('[data-dropdown-label]');
                var input = dropdown.querySelector('[data-dropdown-input]');
                label.textContent = defaultLabels[i];
                label.classList.remove('has_value');
                if (input) input.value = '';
            });

            if (typeof window.setFavoriteLocationFilter === 'function') {
                window.setFavoriteLocationFilter('all');
            }

            var allPill = document.querySelector('.category_pill[data-filter="all"]');
            if (allPill) allPill.click();
        });
    }
})();
</script>

<script>
(function () {
    var taglines = [
        'From hidden gems nestled away from the usual tourist trails to iconic landmarks that define Bali, every recommendation is thoughtfully tailored to match your travel style.',
        'Explore hidden waterfalls, ancient temples, and secret beaches, each one curated thoughtfully so every recommendation truly matches what you are looking for.',
        'Your perfect Bali adventure starts here, tailored to your mood, your pace, and the way you truly love to travel around this beautiful island.',
        'From sunrise treks on quiet mountains to cozy cafes tucked away in Ubud, discover the side of Bali that truly feels like yours to explore.'
    ];

    var el = document.getElementById('heroTagline');
    if (!el) return;

    var index = 0;

    setInterval(function () {
        index = (index + 1) % taglines.length;
        el.classList.add('fade_out');
        setTimeout(function () {
            el.textContent = taglines[index];
            el.classList.remove('fade_out');
        }, 400);
    }, 4500);
})();
</script>
