<x-layout>
    <div class="content">
        <div class="toolbar">
            <div class="search-bar-container">
                <input
                  id="search"
                  type="search"
                  class="search-bar"
                  placeholder="Search movies..."                  
                />
            </div>
            <div class="add-btn">
                <div>
                    <img src="{{ URL::to('/') }}/images/add.png" alt="info-icon">
                </div>
            </div>
        </div>
        <ul class="movie-list">
          @foreach ($movies as $movie)
              <x-card :movie="$movie"></x-card>
          @endforeach
        </ul>

        @if ($isDeatils)
            <x-details :movie="$movieToDisplay"></x-details>
        @endif

    </div>
    <script>
        
        const searchInput = document.getElementById("search");

        searchInput.addEventListener("input", (event) => {
        const query = event.target.value.trim(); // Get the trimmed value of the input

        if (query.length > 0) {
            window.location.href = `/movies/search?query=${encodeURIComponent(query)}`;
        } else {
            window.location.href = `/movies`;
        }
    });
    </script>
</x-layout>