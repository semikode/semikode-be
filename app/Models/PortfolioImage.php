<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PortfolioImage extends Model
{
    use HasFactory, Blameable, CreatedBy;

	protected $guarded = [];

	public function portfolio()
	{
		return $this->belongsTo(Portfolio::class);
	}

	public function file()
	{
		return $this->belongsTo(File::class, 'file_id');
	}
}
