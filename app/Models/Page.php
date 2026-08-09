<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'content', 'excerpt', 'template', 'featured_image', 'meta_title', 'meta_description', 'meta_keywords', 'is_published', 'sort_order'];
    protected $casts = ['is_published' => 'boolean'];
    public function scopePublished($q) { return $q->where('is_published', true); }
}
