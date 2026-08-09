<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model {
    use HasFactory;
    protected $fillable = ['title', 'subtitle', 'description', 'image', 'video_url', 'button_text', 'button_url', 'button_text_2', 'button_url_2', 'sort_order', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];
    public function scopeActive($q) { return $q->where('is_active', true)->orderBy('sort_order'); }
}
