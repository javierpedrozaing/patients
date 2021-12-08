<?php namespace web\Patients\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Forms extends Controller
{
    public $requiredPermissions = ['web.patients.access_forms'];
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
    }
}
