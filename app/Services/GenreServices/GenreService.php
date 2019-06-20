<?php

namespace App\Services\GenreServices;
use App\Genre;

class GenreService {

    public function getGenres()
    {
        return Genre::all();
    }
}