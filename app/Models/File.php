<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory, Blameable, CreatedBy;

	protected $guarded = [];
}
