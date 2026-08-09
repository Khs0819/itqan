<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model {
    protected $fillable = ['title', 'slug', 'excerpt', 'content', 'image', 'icon', 'category_id', 'is_active', 'sort_order'];
    protected $casts = ['is_active' => 'boolean'];
    public function category(): BelongsTo { return $this->belongsTo(Category::class); }
    public function scopeActive($q) { return $q->where('is_active', true)->orderBy('sort_order'); }
}
