<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'title',
        'description',
        'completed',
        'completed_at',
        'deleted_at',
    ];

    protected $casts = [
        'completed' => 'boolean',
        'completed_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }
}
