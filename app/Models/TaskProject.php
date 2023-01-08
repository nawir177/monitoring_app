<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskProject extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function Project(){
        return $this->belongsTo(Project::class);
    }
}
