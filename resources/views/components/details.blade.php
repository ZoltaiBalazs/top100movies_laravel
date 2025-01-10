<div class="modal-overlay">
  <form action="/movies/{{ $movie->Id }}" method="POST">
    @method('DELETE')
    @csrf
    <div class="modal">
      <div class="modal-header">
        <a href="/">
            <button class="close-button">X</button>
        </a>
        <div class="modal-poster">
          <img src="{{ $movie->Image }}" alt="poster">
        </div>
        <div class="movie-data">
          <h3>{{ $movie->Title }}</h3>
          <div class="movie-info">
            <span class="release-date">{{ $movie->Released }}</span>
            <span class="runtime">{{ $movie->Runtime }}</span>
            <span class="rating">{{ $movie->Rated }}</span>
          </div>
          <span class="movie-genre">{{ $movie->Genres }}</span>
          <div class="movie-rating">
            <div>
              <img src="{{ URL::to('/') }}/images/star.png" alt="star-icon">
            </div>
            <span class="rating-value">{{ $movie->Imdb_rating }}/10</span>
          </div>
        </div>
      </div>
      <div class="movie-plot">
        {{$movie->Plot}}
      </div>
      <div class="movie-director">
        <span>Director:</span>
        <span>{{ $movie->Director }}</span>
      </div>
      <div class="movie-actors">
        <span>Stars:</span>
        <span>{{ $movie->Actors }}</span>
      </div>
      <div class="movie-actions">
        <button class="edit-button">Edit</button>
        <button type="submit" class="delete-button">Delete</button>
      </div>
    </div>
  </form>
</div>
  
  {{-- @if (isDeleteConfirmationVisible) {
    <div class="modal-overlay">
      <div class="modal">
        <h2>Are you sure you want to delete this movie?</h2>
        <div class="confirmation-actions">
          <button class="confirm-button" (click)="confirmDelete()">Yes, delete</button>
          <button class="cancel-button" (click)="cancelDelete()">Cancel</button>
        </div>
      </div>
    </div>
} --}}