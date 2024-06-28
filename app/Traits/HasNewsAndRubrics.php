<?php

namespace App\Traits;

use App\Models\News;
use App\Models\Rubrics;

trait HasNewsAndRubrics
{
    public function rubric()
    {
        return $this->belongsToMany(Rubrics::class,'news_rubrics', 'new_id', 'rubric_id');
    }
}
