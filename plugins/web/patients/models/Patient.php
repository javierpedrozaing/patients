<?php namespace web\Patients\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Model;

/**
 * Model
 */
class Patient extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'web_patients_patient';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belogsTo = [
        'user' => ['RainLab\User\Models\User'] 
    ];

    public static function getFromUser($user){
        if ($user->patient) {
            return $user->patient;
        }

        $patient = new static;
        $patient->user = $user;
        $patient->save();

        $user->patient = $patient;
        return $patient;
    }

    public $belongsToMany = [
        'forms' => [
            'Web\Patients\Models\Form',
            'table'     => 'web_patients_form_patient',
            'key'       => 'patient_id',
            'otherKey'  => 'form_id'
        ],
        'posts' => [
            'RainLab\Blog\Models\Post',
            'table'     => 'web_patients_post_patient',
            'key'       => 'patient_id',
            'otherKey'  => 'post_id'
        ]
    ];


}
