<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class SoftDeletesModel extends Model
{
  use SoftDeletes;

  public function __construct(array $attributes = [])
  {
    parent::__construct($attributes);

    $this->hidden[] = 'deleted_at';
    $this->casts['deleted_at'] = 'datetime:Y-m-d H:i:s';
    $this->guarded[] = 'deleted_at';
  }
}
