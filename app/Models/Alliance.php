<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alliance extends Model
{
    protected $fillable = [
        'organization_name', 'type', 'description',
    ];

    // Relación muchos a muchos con la entidad Project
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'alliance_project')
            ->withTimestamps();
    }

    // Relación muchos a muchos con la entidad Evaluation
    public function evaluations()
    {
        return $this->belongsToMany(Evaluation::class, 'evaluation_alliance')
            ->withTimestamps();
    }
}
