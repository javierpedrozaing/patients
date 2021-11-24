<?php namespace web\Patients\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateWebPatientsFormPatient extends Migration
{
    public function up()
    {
        Schema::create('web_patients_form_patient', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('patient_id');
            $table->integer('form_id');
            $table->primary(['patient_id','form_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('web_patients_form_patient');
    }
}
