<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'due_date',
    ];

    protected $casts = [
        'due_date' => 'date',
    ];

    public function scopePending()
    {
        return $this->where('status', 'pending');
    }

    public function scopeCompleted()
    {
        return $this->where('status', 'completed');
    }
}
