<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Genre;
use App\Services\GenreServices\GenreService;

class GenresController extends Controller
{
    public function __construct(GenreService $genreService)
    {
        $this->genreService=$genreService;
    }
    
    public function index()
    {
    return $this->genreService->getGenres();
    }

}
