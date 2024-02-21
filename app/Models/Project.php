<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'languages',
        'repo_url'
    ];
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function Technologies()
    {
        return $this->belongsToMany(Technology::class)->withTimestamps();
    }
}