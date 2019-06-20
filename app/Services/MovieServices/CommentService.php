<?php

namespace App\Services\MovieServices;

use App\Comment;
use App\Movie;

class CommentService {
    public function getCommentsForMovie ($movie)
    {
       return $movie->comments;
    }
    public function createComment ($movieId, $content)
    {
      return Comment::create(['content'=>$content, 'movie_id'=>$movieId]);
    }
    public function deleteComment($comment){
        $comment->delete();
        return $comment;
    }   
}