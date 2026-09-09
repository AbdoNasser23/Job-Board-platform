<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobVacancy extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $table = "job_vacancies";

    protected $keyType = 'string';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'description',
        'location',
        'type',
        'salary',
        'company_id',
        'category_id',
    ];

    protected function casts(): array
    {
        return [
            'deleted_at' => 'datetime',
        ];
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
    public function jobCategory()
    {
        return $this->belongsTo(JobCategory::class, 'category_id', 'id');
    }

    public function jobApplication()
    {
        return $this->hasMany(JobApplication::class, 'job_vacancy_id', 'id');
    }

}
