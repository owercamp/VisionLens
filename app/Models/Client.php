<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  use HasFactory;

  protected $table = 'clients';

  protected $primaryKey = 'cli_id';

  protected $guarded = [];

  public $timestamps = true;
}
