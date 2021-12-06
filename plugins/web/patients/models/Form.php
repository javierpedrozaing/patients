<?php namespace web\Patients\Models;

use Model;

/**
 * Model
 */
class Form extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'web_patients_forms';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsToMany = [
        'users' => \Acme\Blog\Models\User::class,
        'table' => 'web_patients_form_patient',
        'key'=> 'form_id',   
        'otherKey' => 'patient_id'
    ];

    public static function getFromUser($user){
        
        if ($user->find($user->id)->forms) {
            return $user->forms;
        }

        $form = new static;
        $form->user = $user;
        $form->save();

        $user->find(1)->forms = $form;
        return $user;
    }

}
