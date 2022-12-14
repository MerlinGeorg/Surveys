<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyUserInput extends Model
{
    use HasFactory;

    protected $table='survey_user_inputs';
    protected $fillable = [
        'surveyId',
        'userId',
        'answer'
    ];

    public function surveys(){
        return $this->belongsTo(Survey::class, 'surveyId','id');
    }
}
