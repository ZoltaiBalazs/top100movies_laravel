import fs from "fs";

// Read the JSON file
const moviesData = fs.readFileSync('./db_transformed.json', 'utf-8');
const movies = JSON.parse(moviesData).movies;

// Function to generate genre inserts
function generateGenreInserts(movies) {
    const inserts = [];

    movies.forEach((movie) => {
        const movieId = movie.id;
        if (movie.Genre && movie.Genre.length > 0) {
            movie.Genre.forEach((genre) => {
                const genreInsert = `INSERT INTO movie_genres (Genre, movies_movies_fk) VALUES ('${genre}', ${movieId});`;
                inserts.push(genreInsert);
            });
        }
    });

    return inserts;
}

const genreInserts = generateGenreInserts(movies);

// Write the queries to a file
fs.writeFileSync('./genre-inserts.txt', genreInserts.join('\n'));

console.log('Genre inserts generated successfully.');