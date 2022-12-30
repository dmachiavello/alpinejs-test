<?php

// pretend this came from the database/controller
$movies = [
        ['id'=> 1, 'title' => 'Back to the Future', 'director' => 'Robert Zemeckis', 'year' => 1985, 'poster' => 'https://m.media-amazon.com/images/M/MV5BZmU0M2Y1OGUtZjIxNi00ZjBkLTg1MjgtOWIyNThiZWIwYjRiXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_QL75_UX380_CR0,14,380,562_.jpg'],
        ['id'=> 2, 'title' => 'Kung Fu Hustle', 'director' => 'Stephen Chow', 'year' => 2004, 'poster' => 'https://m.media-amazon.com/images/M/MV5BMjZiOTNlMzYtZWYwZS00YWJjLTk5NDgtODkwNjRhMDI0MjhjXkEyXkFqcGdeQXVyMjgyNjk3MzE@._V1_QL75_UY562_CR10,0,380,562_.jpg'],
        ['id'=> 3, 'title' => 'Captain America: The Winter Soldier', 'director' => 'Anthony Russo & Joe Russo', 'year' => 2014, 'poster' => 'https://m.media-amazon.com/images/M/MV5BMzA2NDkwODAwM15BMl5BanBnXkFtZTgwODk5MTgzMTE@._V1_QL75_UY562_CR3,0,380,562_.jpg'],
];

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Testing AlpineJS</title>
</head>
<body>

<div x-data='{currentMovie: {}, movies: <?= json_encode($movies) ?>}' class="m-2">
    <h2 class="text-4xl font-light mb-2">Movies</h2>
    <ul class="divide-y max-w-lg border border-gray-300 rounded-lg shadow">
        <template x-for="movie in movies" :key="movie.id">
            <li x-text="movie.title" @click="currentMovie = movie; $refs.movieDialog.show()" class="py-2 px-4 hover:bg-blue-100 cursor-pointer"></li>
        </template>
    </ul>

    <dialog
            x-ref="movieDialog"
            x-model="currentMovie"
            class="relative z-10"
            aria-labelledby="modal-title"
            role="dialog"
            aria-modal="true"
    >
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div @click="$refs.movieDialog.close()" class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                    <div class="flex space-x-4">
                        <div class="w-64">
                            <img :src="currentMovie.poster">
                        </div>
                        <div class="mt-3 sm:mt-5">
                            <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title" x-text="currentMovie.title">Some
                                Title</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">Director: <span x-text="currentMovie.director">director</span></p>
                                <p class="text-sm text-gray-500">Year: <span x-text="currentMovie.year">year</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-6">
                        <button @click="$refs.movieDialog.close()" type="button" class="inline-flex w-full justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:text-sm">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </dialog>
</div>

</body>
</html>
