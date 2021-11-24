<?php namespace web\Patients\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateWebPatientsPatient7 extends Migration
{
    public function up()
    {
        Schema::table('web_patients_patient', function($table)
        {
            $table->string('forms', 255)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('web_patients_patient', function($table)
        {
            $table->string('forms', 255)->nullable(false)->change();
        });
    }
}
