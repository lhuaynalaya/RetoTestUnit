<?php namespace App\Traits;

use Webpatser\Uuid\Uuid;

trait Audit {
  protected static function boot(){

    static::creating(function($model) {
      $model->{$model->getKeyName()} = Uuid::generate()->string;
      $model->usuario_creacion = session('org_usuario_id', '');
    });

    static::updating(function($model) {
      $model->usuario_modificacion = session('org_usuario_id', '');
    });

    parent::boot();
  }
}