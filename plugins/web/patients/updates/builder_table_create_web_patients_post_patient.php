<?php namespace web\Patients\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateWebPatientsPostPatient extends Migration
{
    public function up()
    {
        Schema::create('web_patients_post_patient', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('patient_id');
            $table->integer('post_id');
            $table->primary(['patient_id','post_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('web_patients_post_patient');
    }
}
