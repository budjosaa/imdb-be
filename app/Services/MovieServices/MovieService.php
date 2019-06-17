<?php

namespace App\Services\MovieServices ;
use App\Movie;


class MovieService {

    public function show(){}
    
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