<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'description', 'start_date', 'end_date', 'budget', 'status',
    ];

    // Relación muchos a muchos con la entidad Activity
    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'activity_project')
            ->withTimestamps();
    }

    // Relación muchos a muchos con la entidad Alliance
    public function alliances()
    {
        return $this->belongsToMany(Alliance::class, 'alliance_project')
            ->withTimestamps();
    }

    // Relación muchos a muchos con la entidad Evaluation
    public function evaluations()
    {
        return $this->belongsToMany(Evaluation::class, 'evaluation_project')
            ->withTimestamps();
    }
}

