<?php namespace web\Patients\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateWebPatientsPatient extends Migration
{
    public function up()
    {
        Schema::rename('web_patients_users', 'web_patients_patient');
    }
    
    public function down()
    {
        Schema::rename('web_patients_patient', 'web_patients_users');
    }
}
