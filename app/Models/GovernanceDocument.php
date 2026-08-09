<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GovernanceDocument extends Model {
    use HasFactory;
    protected $fillable = ['title', 'slug', 'description', 'file_path', 'file_type', 'type', 'category_id', 'sort_order', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];
    public function category(): BelongsTo { return $this->belongsTo(Category::class); }
    public function scopeActive($q) { return $q->where('is_active', true)->orderBy('sort_order'); }
    public function scopeType($q, string $type) { return $q->where('type', $type); }
}
