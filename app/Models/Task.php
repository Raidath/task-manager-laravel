<?php

namespace App\Models;

use App\Models\User ;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title',  'description','status', 'due_date', 'user_id'];
    public function user()
{
    return $this->belongsTo(User::class);
}
public function scopeByStatus($query, $status)
{
    if ($status) {
        $query->where('status', $status);
    }
}
}
