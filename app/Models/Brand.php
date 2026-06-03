<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Brand extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'name', 'image', 'is_active', 'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo')->singleFile();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(240)->height(240)
            ->performOnCollections('logo');
    }

    // Returns the uploaded logo (thumb), falls back to the image path, then empty
    public function getLogoUrlAttribute(): string
    {
        return $this->getFirstMediaUrl('logo', 'thumb') ?: ($this->image ?? '');
    }
}
