<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Initiative extends Model {
    use HasFactory;
    protected $fillable = ['title', 'slug', 'excerpt', 'content', 'image', 'icon', 'is_active', 'sort_order'];
    protected $casts = ['is_active' => 'boolean'];
    public function scopeActive($q) { return $q->where('is_active', true)->orderBy('sort_order'); }
}
