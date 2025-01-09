<li class="movie-item">
    <div class="movie-poster">
      <img src="{{ $movie->Image }}" alt="{{ $movie->Title }} poster">
    </div>

    <div class="movie-details">
      <div class="movie-header">
        <h3 class="movie-title">{{ $movie->Id }}. {{ $movie->Title }}</h3>
      </div>
      <div class="movie-info">
        <span class="release-date">{{ $movie->Released }}</span>
        <span class="runtime">{{ $movie->Runtime }}</span>
        <span class="rating">{{ $movie->Rated }}</span>
      </div>
      <div class="movie-rating">
        <div>
          <img src="./images/star.png" alt="star-icon">
        </div>
        <span class="rating-value">{{ $movie->Imdb_rating }}</span>
      </div>
    </div>

    <div class="movie-info-button">
      <div title="See more info about {{ $movie->Title }}">
        <img src="./images/info.png" alt="info-icon" title="See more info about {{ $movie->Title }}">
      </div>
    </div>
</li>