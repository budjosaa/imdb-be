<?php

namespace App\Services\MovieServices;

use App\Comment;
use App\Movie;
use App\User;

class CommentService {
    public function getCommentsForMovie ($movie)
    {
       $comments = $movie->comments;
       return $this->attachUserToComment($comments);
    }
    public function createComment ($movieId, $content, $userId)
    {
      return Comment::create(['content'=>$content, 'movie_id'=>$movieId,'user_id'=>$userId]);
    }
    public function deleteComment($comment){
        $comment->delete();
        return $comment;
    }
    public function attachUserToComment ($comments)
    {
      foreach($comments as $comment){
        $comment->user;
      }
      return $comments;
    }   
}