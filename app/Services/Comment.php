<?php
namespace App\Services;

use App\Repositories\Comment as CommentRepository;

class Comment {
    protected $comments;

    public function __construct(CommentRepository $comments) {
        $this->comments = $comments;
    }

    public function all() {
      return $this->comments->all();
    }

    public function store($data){
        return $this->comments->create($data);
    }

    public function update($data, $id){
        return $this->comments->update($data, $id);
    }

    public function delete($id){
        return $this->comments->delete($id);
    }

    public function paginate($perPage = 15, $columns = array('*'), $order_type = 'desc') {
        return $this->comments->paginate($perPage, $columns, $order_type);
    }

    public function find($id, $columns = array('*')) {
        return $this->comments->find($id, $columns);
    }

    public function findBy($field, $value, $columns = array('*')) {
        return $this->comments->findBy($field, $value, $columns);
    }
}