<?php namespace web\Patients\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateWebPatientsPatient3 extends Migration
{
    public function up()
    {
        Schema::table('web_patients_patient', function($table)
        {
            $table->integer('user_id');
        });
    }
    
    public function down()
    {
        Schema::table('web_patients_patient', function($table)
        {
            $table->dropColumn('user_id');
        });
    }
}
