<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GalleryAlbum extends Model {
    use HasFactory;
    protected $fillable = ['title', 'slug', 'description', 'cover_image', 'sort_order', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];
    public function items(): HasMany { return $this->hasMany(GalleryItem::class); }
    public function scopeActive($q) { return $q->where('is_active', true)->orderBy('sort_order'); }
}
