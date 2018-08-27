<?php namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

class Post extends Repository {

  function model()
  {
    return 'App\Models\Post';
  }
}