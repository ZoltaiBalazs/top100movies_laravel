<div class="modal-overlay">
    <div class="modal">
      <h2>Add New Movie</h2>
      <form action="/{{ $action }}" method="{{ $method }}" class="modal-form">        
        @csrf       
        <div class="form-group horizontal">            
          <label for="title">Title:</label>
          <input type="text" id="title" name="title" required value="{{ $movie->Title }}" placeholder="Enter movie title"/>
        </div>

        <div class="form-group horizontal">
            <label for="image">Image:</label>
            <input type="text" id="image" name="image" placeholder="Enter image URL" required />
        </div>
  
        <div class="form-group horizontal">
          <label for="releaseDate">Release Date:</label>
          <input type="date" id="releaseDate" name="releaseDate" required />
        </div>
  
        <div class="form-group horizontal runtime-inputs">
          <label>Runtime:</label>
          <input type="number" min="0" placeholder="Hrs" name="runtimeHours" required />
          <span>h</span>
          <input type="number" min="0" placeholder="Min" name="runtimeMinutes" required />
          <span>min</span>
        </div>
  
        <div class="form-group horizontal">
          <label for="rating">Rating:</label>
          <select id="rating" name="rating" required aria-placeholder="Select rating">
            <option value="G">G</option>
            <option value="PG">PG</option>
            <option value="PG-13">PG-13</option>
            <option value="R">R</option>
            <option value="NC-17">NC-17</option>
          </select>
        </div>
  
        <div class="form-group horizontal">
          <label for="genre">Genre:</label>
          <input type="text" id="genre" name="genre" required value="{{ $movie->Genre }}" placeholder="Enter movie genre"/>
        </div>
  
        <div class="imdb-holder">
            <div class="form-group horizontal">
                <label for="imdbRating">IMDB Rating:</label>
                <input type="number" step="0.1" min="1" max="10" id="imdbRating" name="imdbRating" required placeholder="Enter rating"/>
            </div>
        
              <!-- New fields -->
            <div class="form-group horizontal">
                <label for="imdbId">IMDB ID:</label>
                <input type="text" id="imdbId" name="imdbId" required placeholder="Enter movie id"/>
            </div>
        </div>
  
        <div class="form-group horizontal">
            <label for="director">Director:</label>
            <input type="text" id="director" name="director" required placeholder="Enter director"/>
        </div>

        <div class="form-group horizontal">
          <label for="writer">Writer:</label>
          <input type="text" id="writer" name="writer" required placeholder="Enter writers"/>
        </div>          
        
        <div class="form-group horizontal">
            <label for="actors">Actors:</label>
            <input type="text" id="actors" name="actors" required placeholder="Enter actors"/>
        </div>
        
        <div class="form-group">
          <label for="plot" id="plot">Plot:</label>
          <textarea id="plot" name="plot" required placeholder="Enter plot description"></textarea>
        </div>
  
        <div class="form-actions">
          <button type="submit" class="submit-button">Submit</button>
          <a href="/movies">
            <button type="button" class="cancel-button">Cancel</button>
          </a>
        </div>
      </form>
    </div>
  </div>
  
  <style>
    .modal-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.2);
      display: flex;
      justify-content: center;
      align-items: center;
    }
  
    .modal {
      background: #1f1f1f; /* Dark background for the modal */
      color: #f5f5f5; /* Light text for good contrast */
      border-radius: 8px;
      padding: 20px;
      width: 30%;
      max-width: 500px;
      height: 50%;
      max-height: 600px;
      overflow-y: auto;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
    }
  
    .modal h2 {
      margin-bottom: 20px;
      text-align: center;
      color: #ffffff; /* Bright white for heading */
    }
  
    .form-group {
      margin-bottom: 15px;
      display: flex;
      flex-direction: column;
    }
  
    .form-group.horizontal {
      flex-direction: row;
      align-items: center;
      justify-content: space-between;
    }
  
    .form-group label {
      margin-bottom: 5px;
      font-weight: bold;
      color: #d3d3d3; /* Light gray for labels */
    }
  
    .form-group.horizontal label {
      margin-bottom: 0;
      margin-right: 10px;
      white-space: nowrap;
    }
  
    .form-group input,
    .form-group textarea,
    .form-group select {
      flex-grow: 1;
      padding: 8px;
      border: 1px solid #555; /* Medium gray border for inputs */
      border-radius: 4px;
      background: #333; /* Darker input background */
      color: #f5f5f5; /* Light text inside inputs */
    }
  
    .form-actions {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }
  
    .submit-button {
      background: #4caf50; /* Green background for submit */
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
    }
  
    .cancel-button {
      background: #f44336; /* Red background for cancel */
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
    }
  
    .submit-button:hover,
    .cancel-button:hover {
      opacity: 0.9;
    }
  
    .runtime-inputs span {
      margin: 0 5px;
      color: #d3d3d3; /* Light gray for time unit labels */
    }

    div.imdb-holder {
        display: flex;        
        flex-direction: row;
    }

    div.imdb-holder div {
        width: 50%;
    }

    div.imdb-holder div:first-of-type {
        width: 50%;
        margin-right: 10px; 
    }
  </style>