<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobPosting extends Model {
    use HasFactory;
    protected $fillable = ['title', 'slug', 'description', 'requirements', 'type', 'location', 'department', 'deadline', 'is_active'];
    protected $casts = ['is_active' => 'boolean', 'deadline' => 'date'];
    public function applications(): HasMany { return $this->hasMany(JobApplication::class); }
    public function scopeActive($q) { return $q->where('is_active', true); }
}
