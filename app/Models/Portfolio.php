<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Traits\CreatedBy;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends Model
{
    use HasFactory, Blameable, CreatedBy, HasSlug;

	protected $guarded = [];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function images()
	{
		return $this->hasMany(PortfolioImage::class, 'portfolio_id');
	}

	public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
