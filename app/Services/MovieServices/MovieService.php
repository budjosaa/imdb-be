<?php

namespace App\Services\MovieServices ;
use App\Movie;


class MovieService {

    public function show($movie)
    {
        $movie->times_visited+=1;
        $movie->save();
        return $movie;
    }
    
    public function index ($elemntsPerPage = 5,$title)
    {
        $queryBuilder = Movie::query();
        if($title)
        {
            $queryBuilder = $queryBuilder->where('title','like','%'.$title.'%');
        }
        return $queryBuilder->paginate($elemntsPerPage);   
    }
}