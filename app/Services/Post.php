<?php
namespace App\Services;

use App\Repositories\Post as PostRepository;

class Post {
    protected $posts;

    public function __construct(PostRepository $posts) {
        $this->posts = $posts;
    }

    public function all() {
      return $this->posts->all();
    }

    public function store($data){
        return $this->posts->create($data);
    }

    public function update($data, $id){
        return $this->posts->update($data, $id);
    }

    public function delete($id){
        return $this->posts->delete($id);
    }

    public function paginate($perPage = 15, $columns = array('*'), $order_type = 'desc') {
        return $this->posts->paginate($perPage, $columns, $order_type);
    }

    public function find($id, $columns = array('*')) {
        return $this->posts->find($id, $columns);
    }

    public function findBy($field, $value, $columns = array('*')) {
        return $this->posts->findBy($field, $value, $columns);
    }
}