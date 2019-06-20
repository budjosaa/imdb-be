<?php

namespace App\Services\MovieServices ;
use App\Movie;
use App\Like;



class MovieService {

    public function show($movie)
    {
    }
    
    public function index ($elemntsPerPage = 5,$title,$genreId)
    {
        $queryBuilder = Movie::query();
        if($title)
        {
            $queryBuilder = $queryBuilder->where('title','like','%'.$title.'%');
        }
        if($genreId)
        {
            $queryBuilder = $queryBuilder->where('genre_id',$genreId);
        }
            return $queryBuilder->paginate($elemntsPerPage);   
    }   

    public function incrementViews($id)
    {
        Movie::where('id',$id)->increment('times_visited');
    }

    public function like($userId,$movieId,$reaction)
    {
        $like=Like::where('user_id',$userId)
                  ->where('movie_id',$movieId)
                  ->first();
        $movie=Movie::find($movieId);
        if (!$like) {
            $this->createReaction($movieId,$userId,$reaction);
            $this->incrementReaction($movie,$reaction);
            return $movie; 
        }
        if($like->reaction==$reaction) {
            $this->deleteReaction($like);
            $this->decrementReaction($movie,$reaction);
            return $movie;
        }
        $this->changeReaction($movie,$reaction,$like);
        $this->updateReaction($like,$reaction);
        return $movie;
    }

    protected function createReaction($movieId,$userId,$reaction)
    {
        return Like::create(['user_id'=>$userId,'movie_id'=>$movieId,'reaction'=>$reaction]);
    }

    protected function deleteReaction($like)
    {
        $like->delete();
    }

    protected function updateReaction($like,$reaction)
    {
        $like->update(['reaction'=>$reaction]);
    }

    protected function incrementReaction($movie,$reaction)
    {
        $movie->increment('num_of_'.$reaction.'s');
    }

    protected function decrementReaction($movie,$reaction)
    {
        $movie->decrement('num_of_'.$reaction.'s');
    }

    protected function changeReaction($movie,$reaction,$like)
    {
        $this->incrementReaction($movie,$reaction);
        $this->decrementReaction($movie,$like->reaction);
    }

}