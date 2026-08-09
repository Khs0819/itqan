<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TimelineEvent extends Model {
    protected $fillable = ['title', 'description', 'year', 'month', 'icon', 'image', 'sort_order', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];
    public function scopeActive($q) { return $q->where('is_active', true)->orderBy('sort_order'); }
}
