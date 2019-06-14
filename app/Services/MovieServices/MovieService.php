<?php

namespace App\Services\MovieServices ;
use App\Movie;


class MovieService {

    public function show(){}
    
    public function index ($elemntsPerPage = 5){
        return Movie::paginate($elemntsPerPage);
    }

}