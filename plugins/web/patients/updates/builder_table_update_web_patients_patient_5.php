<?php namespace web\Patients\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateWebPatientsPatient5 extends Migration
{
    public function up()
    {
        Schema::table('web_patients_patient', function($table)
        {
            $table->text('user')->nullable()->change();
            $table->integer('user_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('web_patients_patient', function($table)
        {
            $table->text('user')->nullable(false)->change();
            $table->integer('user_id')->nullable(false)->change();
        });
    }
}
