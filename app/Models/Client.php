<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Client extends Model
{
    use HasFactory, Blameable, CreatedBy, HasSlug;

	protected $guarded = [];

	public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

	public function file()
	{
		return $this->belongsTo(File::class);
	}
}
