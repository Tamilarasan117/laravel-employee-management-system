<?php

namespace App\Models;

use Illuminate\Database\Eloquent\HasBuilder;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model {
  use HasBuilder;
  // protected $fillable = ['name']; // it store only given field and it's mass assignment
  protected $guarded = []; // except given field all field store and it's not an mass assignment
}