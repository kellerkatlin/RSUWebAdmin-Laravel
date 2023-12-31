<?php

namespace App\Models\Proyectos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $appends = ["open"];
 
    public function getOpenAttribute(){
        return true;
    }

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }
}
