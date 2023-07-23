<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'title', 'description', 'date', 'participants', 'status',
    ];

    // Relación uno a muchos inversa con la entidad User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación muchos a muchos con la entidad Project
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'activity_project')
            ->withTimestamps();
    }

    // Relación muchos a muchos con la entidad Evaluation
    public function evaluations()
    {
        return $this->belongsToMany(Evaluation::class, 'evaluation_activity')
            ->withTimestamps();
    }
}
