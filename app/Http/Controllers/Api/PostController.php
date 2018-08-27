<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePost;
use App\Services\Post as PostService;

class PostController extends Controller{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index(){
        return $this->postService->all();
    }

    public function store(StorePost $request){
        return $this->postService->store($request->all());
    }

    public function update(StorePost $request, $post){
        return $this->postService->update($request-> all(), $post->id);
    }

    public function destroy($post){
        return $this->postService->delete($post->id);
    }

    public function show($post){
        return $post;
    }
}