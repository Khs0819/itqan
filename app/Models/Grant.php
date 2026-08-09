<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Grant extends Model {
    use HasFactory;
    protected $fillable = ['title', 'slug', 'description', 'requirements', 'conditions', 'type', 'deadline', 'is_active'];
    protected $casts = ['is_active' => 'boolean', 'deadline' => 'date'];
    public function applications(): HasMany { return $this->hasMany(GrantApplication::class); }
    public function scopeActive($q) { return $q->where('is_active', true); }
}
