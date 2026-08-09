<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'type', 'image', 'sort_order', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($q) { return $q->where('is_active', true); }
    public function scopeType($q, string $type) { return $q->where('type', $type); }
    public function scopeOrdered($q) { return $q->orderBy('sort_order'); }

    public function programs(): HasMany { return $this->hasMany(Program::class); }
    public function news(): HasMany { return $this->hasMany(News::class); }
    public function services(): HasMany { return $this->hasMany(Service::class); }
}
