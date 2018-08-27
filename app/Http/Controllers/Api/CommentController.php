<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreComment;
use App\Services\Comment as CommentService;

class CommentController extends Controller{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function index(){
        return $this->commentService->all();
    }

    public function store(StoreComment $request){
        return $this->commentService->store($request->all());
    }

    public function update(StoreComment $request, $comment){
        return $this->commentService->update($request-> all(), $comment->id);
    }

    public function destroy($comment){
        return $this->commentService->delete($comment->id);
    }

    public function show($comment){
        return $comment;
    }
}