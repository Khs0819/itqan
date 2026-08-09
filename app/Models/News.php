<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model {
    use HasFactory;
    protected $fillable = ['title', 'slug', 'excerpt', 'content', 'image', 'category_id', 'user_id', 'is_featured', 'is_published', 'published_at', 'views_count', 'meta_title', 'meta_description'];
    protected $casts = ['is_featured' => 'boolean', 'is_published' => 'boolean', 'published_at' => 'datetime'];
    public function category(): BelongsTo { return $this->belongsTo(Category::class); }
    public function author(): BelongsTo { return $this->belongsTo(User::class, 'user_id'); }
    public function scopePublished($q) { return $q->where('is_published', true)->where('published_at', '<=', now()); }
    public function scopeFeatured($q) { return $q->where('is_featured', true); }
    public function scopeLatest($q) { return $q->orderByDesc('published_at'); }
    public function incrementViews(): void { $this->increment('views_count'); }
}
