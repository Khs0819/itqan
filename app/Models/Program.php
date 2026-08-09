<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Program extends Model {
    use HasFactory;
    protected $fillable = ['title', 'slug', 'excerpt', 'content', 'image', 'icon', 'category_id', 'is_featured', 'is_active', 'sort_order', 'meta_title', 'meta_description'];
    protected $casts = ['is_featured' => 'boolean', 'is_active' => 'boolean'];
    public function category(): BelongsTo { return $this->belongsTo(Category::class); }
    public function scopeActive($q) { return $q->where('is_active', true); }
    public function scopeFeatured($q) { return $q->where('is_featured', true); }
    public function scopeOrdered($q) { return $q->orderBy('sort_order'); }
}
