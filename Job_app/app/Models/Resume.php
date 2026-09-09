<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resume extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $table = "resumes";

    protected $keyType = 'string';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'file_name',
        'file_uri',
        'contact_details',
        'skills',
        'summary',
        'experience',
        'education',
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'deleted_at' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function jobApplication()
    {
        return $this->hasMany(JobApplication::class, 'resume_id', 'id');
    }
}
