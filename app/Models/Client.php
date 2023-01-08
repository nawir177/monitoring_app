<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    protected $guarded = [
        'id'
    ];

    public function project(){
        $this->hasMany(Project::class);
    }

    use HasFactory;
}

