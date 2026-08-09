<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GrantApplication extends Model {
    use HasFactory;
    protected $fillable = ['grant_id', 'name', 'email', 'phone', 'national_id', 'university', 'major', 'gpa', 'purpose', 'attachment', 'status', 'notes'];
    public function grant(): BelongsTo { return $this->belongsTo(Grant::class); }
}
