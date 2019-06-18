<?php

namespace App\Services\MovieServices ;
use App\Movie;


class MovieService {

    public function show($movie)
    {
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
    public function increment($id){
        $movie=Movie::find($id)->increment('times_visited');
    }
 
}