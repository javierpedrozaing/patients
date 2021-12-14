<?php namespace web\Patients\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateWebPatientsPatient8 extends Migration
{
    public function up()
    {
        Schema::table('web_patients_patient', function($table)
        {
            $table->string('names_familiar_1')->nullable();
            $table->string('phone_familiar_1')->nullable();
            $table->string('names_familiar_2')->nullable();
            $table->string('phone_familiar_2')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('web_patients_patient', function($table)
        {
            $table->dropColumn('names_familiar_1');
            $table->dropColumn('phone_familiar_1');
            $table->dropColumn('names_familiar_2');
            $table->dropColumn('phone_familiar_2');
        });
    }
}
