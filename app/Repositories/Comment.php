<?php namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

class Comment extends Repository {

  function model()
  {
    return 'App\Models\Comment';
  }
}