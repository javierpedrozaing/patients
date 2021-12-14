<?php namespace web\Patients;

use System\Classes\PluginBase;
use RainLab\User\Models\User as UserModel;
use RainLab\User\Controllers\Users as UsersController;
use web\Patients\Models\Patient as PatientModel;
use web\Patients\Models\Form as FormModel;

class Plugin extends PluginBase
{
    public function boot()
    {
        UserModel::extend(function($model){
            $model->hasOne['patient'] = ['Web\Patients\Models\Patient', 'key' => 'user_id'];
            $model->belongsToMany['forms'] = [
                'Web\Patients\Models\Form',
                'table' => 'web_patients_form_patient',
                'key'=> 'patient_id',   
                'otherKey' => 'form_id'
            ];
            $model->belongsToMany['posts'] = [
                'RainLab\Blog\Models\Post', 
                'table' => 'web_patients_post_patient',
                'key'=> 'patient_id',   
                'otherKey' => 'post_id'
            ];
        });

        UsersController::extendListColumns(function($list, $model){
            if (!$model instanceof UserModel) {
                return;
            }

            $list->addColumns([
                'cellphone' => [
                    'label' => 'Phone'
                ]
            ]);
        });

        UsersController::extendFormFields(function($form, $model, $context){

            if (!$model instanceof UserModel) {
                return;
            }

            if (!$model->exists) {
                return;
            }

            // ensure taht a profile always exists...
           PatientModel::getFromUser($model);
           FormModel::getFromUser($model);

            $form->addTabFields([
                'patient[cellphone]' => [
                    'label' => 'Celular o teléfono',
                    'tab' => 'Datos paciente',
                    'type' => 'text'
                ],
                'patient[birthday]' => [
                    'label' => 'Cumpleaños',
                    'tab' => 'Datos paciente',
                    'type'=> 'datepicker',
                    'mode'=> 'date'
                ],
                'patient[genre]' => [
                    'label' => 'Género',
                    'tab' => 'Datos paciente',
                    'type' => 'text'
                ],
                'patient[address]' => [
                    'label' => 'Dirección',
                    'tab' => 'Datos paciente',
                    'type' => 'text'
                ],
                'patient[age]' => [
                    'label' => 'Edad',
                    'tab' => 'Datos paciente',
                    'type' => 'number'
                ],
                'patient[document_type]' => [
                    'label' => 'Tipo de documento',
                    'tab' => 'Datos paciente',
                    'type' => 'text'
                ],
                'patient[document]' => [
                    'label' => 'Documento',
                    'tab' => 'Datos paciente',
                    'type' => 'text'
                ],
                'patient[country]' => [
                    'label' => 'País',
                    'tab' => 'Datos paciente',
                    'type' => 'text'
                ],
                'patient[city]' => [
                    'label' => 'Ciudad',
                    'tab' => 'Datos paciente',
                    'type' => 'text'
                ],
                'patient[names_familiar_1]' => [
                    'label' => 'Nombres familiar 1',
                    'tab' => 'Datos paciente',
                    'type' => 'text'
                ],
                'patient[phone_familiar_1]' => [
                    'label' => 'Teléfono familiar 1',
                    'tab' => 'Datos paciente',
                    'type' => 'text'
                ],
                'patient[names_familiar_2]' => [
                    'label' => 'Nombres familiar 2',
                    'tab' => 'Datos paciente',
                    'type' => 'text'
                ],
                'patient[phone_familiar_2]' => [
                    'label' => 'Teléfono familiar 2',
                    'tab' => 'Datos paciente',
                    'type' => 'text'
                ],
                'forms' => [
                    'label' => 'Formularios asignados',
                    'tab' => 'Formularios',
                    'type' => 'relation',
                    'nameFrom' => 'name'
                ],
                'posts' => [
                    'label' => 'Artículos asignados',
                    'tab' => 'Artículos',
                    'type' => 'relation',
                    'nameFrom' => 'title'
                ],
            
            ]);

        });
    }
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function registerMarkupTags()
    {
        return [
            'functions' => [
                'postsByCategory' => ['\Web\Patients\Classes\Custom', 'postsByCategory'],
                'featuredImageByPost' => ['\Web\Patients\Classes\Custom', 'featuredImageByPost'],
            ]
        ];
    }

    public function registerPermissions()
    {
        return [
            'web.patients.access_forms' => [
                'label' => 'Actualizar formularios',
                'tab' => 'Forms',
                'order' => 200,
            ],
            // ...
        ];
    }
}
