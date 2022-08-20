<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Traits\CreatedBy;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Sluggable\HasSlug;

class Category extends Model
{
    use HasFactory, Blameable, CreatedBy, HasSlug;

	protected $guarded = [];

	public function portfolios()
	{
		return $this->hasMany(Portfolio::class);
	}

	public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
