<?php namespace web\Patients;

use System\Classes\PluginBase;
use RainLab\User\Models\User as UserModel;
use RainLab\User\Controllers\Users as UsersController;
use web\Patients\Models\Patient as PatientModel;

class Plugin extends PluginBase
{
    public function boot()
    {
        UserModel::extend(function($model){
            $model->hasOne['patient'] = ['Web\Patients\Models\Patient', 'key' => 'user_id'];
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
                'patient[forms]' => [
                    'label' => 'Formularios',
                    'tab' => 'Formularios',
                    'type' => 'relation',
                ],
                'patient[posts]' => [
                    'label' => 'Artículos',
                    'tab' => 'Artículos',
                    'type' => 'relation',
                    'nameFrom' => 'title'
                ]
            ]);
        });
    }
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }
}
