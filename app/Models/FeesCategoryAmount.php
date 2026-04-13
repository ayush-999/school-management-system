<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeesCategoryAmount extends Model
{
    public function fees_category()
    {
        return $this->belongsTo(FeesCategory::class, 'fees_category_id', 'id');
    }
   
    public function student_class()
    {
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }
}
