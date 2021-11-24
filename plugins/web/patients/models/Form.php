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
}
