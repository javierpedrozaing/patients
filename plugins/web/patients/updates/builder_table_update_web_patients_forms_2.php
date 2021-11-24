<?php namespace web\Patients\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateWebPatientsForms2 extends Migration
{
    public function up()
    {
        Schema::table('web_patients_forms', function($table)
        {
            $table->text('info')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('web_patients_forms', function($table)
        {
            $table->text('info')->nullable(false)->change();
        });
    }
}
