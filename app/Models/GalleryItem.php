<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryItem extends Model {
    use HasFactory;
    protected $fillable = ['gallery_album_id', 'image', 'caption', 'type', 'video_url', 'sort_order'];
    public function album(): BelongsTo { return $this->belongsTo(GalleryAlbum::class, 'gallery_album_id'); }
}
