<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_posts';

    protected $fillable = [
        'title',
        'description',
        'scope',
        'company',
        'location',
        'salary',
        'rate',
        'rate_type',
        'estimated_hours',
        'skills',
        'job_type',
        'experience',
        'category',
        'user_id',
        'status',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
