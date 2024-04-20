<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
  protected $hidden = [
    'id',
    'created_at',
    'updated_at',
  ];

  protected $casts = [
    'created_at' => 'datetime:Y-m-d H:i:s',
    'updated_at' => 'datetime:Y-m-d H:i:s',
  ];

  protected $guarded = [
    'id',
    'created_at',
    'updated_at',
  ];
}
