<x-layout>
    <div class="content">
        <div class="toolbar">
            <div class="search-bar-container">
                <input
                  type="text"
                  class="search-bar"
                  placeholder="Search movies..."
                />
            </div>
            <div class="add-btn">
                <div>
                    <img src="images/add.png" alt="info-icon">
                </div>
            </div>
        </div>
        <ul class="movie-list">
          @foreach ($movies as $movie)
              <x-card :movie="$movie"></x-card>
          @endforeach
        </ul>
</x-layout>
