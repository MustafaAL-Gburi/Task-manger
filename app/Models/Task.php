<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'priority'];
    protected $table = 'tasks';
    // protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
