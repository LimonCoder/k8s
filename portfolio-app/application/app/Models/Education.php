<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Education extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'educations';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function information()
    {
        return $this->belongsTo(Information::class);
    }
}
