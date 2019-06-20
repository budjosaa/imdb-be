<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\MovieServices\CommentService;
use App\Http\Requests\CommentRequest;
use App\Movie;
use App\Comment;

class CommentsController extends Controller
{
    public function __construct (CommentService $commentService)
    {
        $this->commentService = $commentService;
    }
    public function index (Movie $movie) {

       return $this->commentService->getCommentsForMovie ($movie);
    }

    public function store (CommentRequest $request, $id) {
        $commentContent = $request->content;
       return $this->commentService->createComment ($id, $commentContent);
    }

    public function destroy (Comment $comment) {
        return $this->commentService->deleteComment ($comment);
    }
}
