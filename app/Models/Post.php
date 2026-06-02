<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title', 'slug', 'meta_title', 'meta_description', 'category',
        'published_at', 'image', 'content', 'is_active',
    ];

    protected $casts = [
        'published_at' => 'date',
        'is_active'    => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')->singleFile();
    }

    public function registerMediaConversions(\Spatie\MediaLibrary\MediaCollections\Models\Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(405)->height(320)
            ->sharpen(5)
            ->performOnCollections('image');

        $this->addMediaConversion('featured')
            ->width(1000)->height(600)
            ->sharpen(5)
            ->performOnCollections('image');

        $this->addMediaConversion('og')
            ->width(1200)->height(630)
            ->performOnCollections('image');
    }

    // Keeps frontend views working: $post['date'] returns "May 8, 2025"
    public function getDateAttribute(): string
    {
        return $this->published_at?->format('M j, Y') ?? '';
    }

    // Returns thumb conversion if available, falls back to original, then template path
    public function getImageUrlAttribute(): string
    {
        return $this->getFirstMediaUrl('image', 'thumb') ?: ($this->image ?? '');
    }

    // 1200×630 image for Open Graph; falls back to original, then empty
    public function getOgImageUrlAttribute(): string
    {
        return $this->getFirstMediaUrl('image', 'og') ?: ($this->image ?? '');
    }
}
