<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobApplication extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $table = "job_applications";

    protected $keyType = 'string';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'status',
        'ai_generated_score',
        'ai_generated_feedback',
        'job_vacancy_id',
        'resume_id',
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
        public function resume()
        {
            return $this->belongsTo(Resume::class, 'resume_id', 'id');
        }
        public function jobVacancy()
        {
            return $this->belongsTo(JobVacancy::class, 'job_vancancy_id', 'id');
        }
}
