<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model {
    use HasFactory;
    protected $fillable = ['name', 'position', 'type', 'bio', 'image', 'email', 'phone', 'linkedin', 'twitter', 'sort_order', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];
    public function scopeActive($q) { return $q->where('is_active', true)->orderBy('sort_order'); }
    public function scopeType($q, string $type) { return $q->where('type', $type); }
    public function scopeBoard($q) { return $q->type('board'); }
    public function scopeTeam($q) { return $q->type('team'); }
    public function scopeFounders($q) { return $q->type('founders'); }
}
