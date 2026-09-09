<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $table = "companies";

    protected $keyType = 'string';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'address',
        'industry',
        'website',
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
    public function jobVacancy()
    {
        return $this->hasMany(JobVacancy::class, 'company_id', 'id');
    }

}
