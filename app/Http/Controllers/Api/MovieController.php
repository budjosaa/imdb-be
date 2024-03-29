<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie;
Use App\Services\MovieServices\MovieService;
use App\Http\Requests\LikeRequest;
use App\Http\Requests\MovieRequest;

class MovieController extends Controller
{
    public function __construct(MovieService $movieService){
       $this->movieService = $movieService;
       $this->middleware('inc.view',['only'=>['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) 
    {
       $elementsPerPage=$request->query('elementsPerPage');
       $title=$request->query('title');
       $genreId=$request->query('genreId');
       $searchParams = [
           'title' => $title,
           'genreId' => $genreId
       ];
       return $this->movieService->index($elementsPerPage, $searchParams);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieRequest $request)
    {
        $movieParams=request(['title','description','image_url']);
        return $this->movieService->createMovie($movieParams);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return $movie;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }

    public function like(LikeRequest $request, $movieId)
    {
        $userId = auth()->id();
        $reaction=$request->reaction;
        return $this->movieService->like($userId,$movieId,$reaction);
    }
}
