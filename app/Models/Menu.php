<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Menu extends Model {
    protected $fillable = ['name', 'location', 'items', 'is_active'];
    protected $casts = ['items' => 'array', 'is_active' => 'boolean'];
    public static function getByLocation(string $location): ?self { return static::where('location', $location)->where('is_active', true)->first(); }
}
