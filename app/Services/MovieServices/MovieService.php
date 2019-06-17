<?php

namespace App\Services\MovieServices ;
use App\Movie;


class MovieService {

    public function show(){}
    
    public function index ($elemntsPerPage = 5)
    {
        return Movie::paginate($elemntsPerPage);
    }

    public function search ($title) 
    {
        if($title!="")
        {
            return Movie::where('title','like','%'.$title.'%')->paginate(5);
        }
        else
        {
            return Movie::paginate(5);
        }
    }

}