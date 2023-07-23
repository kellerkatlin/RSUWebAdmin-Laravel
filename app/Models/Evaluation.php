<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [
        'evaluation_criteria', 'score', 'comments',
    ];

    // Relación muchos a uno con la entidad Activity
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    // Relación muchos a uno con la entidad Project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // Relación muchos a muchos con la entidad Activity
    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'evaluation_activity')
            ->withTimestamps();
    }

    // Relación muchos a muchos con la entidad Alliance
    public function alliances()
    {
        return $this->belongsToMany(Alliance::class, 'evaluation_alliance')
            ->withTimestamps();
    }
}
