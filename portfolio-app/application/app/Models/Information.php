<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Information extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'informations';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'language' => 'json'
    ];

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
    public function educations()
    {
        return $this->hasMany(Education::class);
    }
    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function stakes()
    {
        return $this->hasMany(Stake::class);
    }

    public function stake()
    {
        return $this->belongsTo(Stake::class, 'stake_id');
    }
}
