<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobVacancyView extends Model
{
    public $fillable = [
        'job_vacancy_id',
        'user_id',
    ];
}
