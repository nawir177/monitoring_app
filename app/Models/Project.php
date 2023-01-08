<?php

namespace App\Models;

use App\Models\Client;
use App\Models\leader;
use App\Models\progres;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function leader(){
        return $this->belongsTo(Leader::class);
    }

    public function progres()
    {
        return $this->hasOne(Progres::class);
    }

    public function taskproject(){
        return $this->hasMany(TaskProject::class);
    }

    public function client(){
         return $this->belongsTo(Client::class);
    }

}
