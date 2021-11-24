<?php namespace web\Patients\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateWebPatientsForms extends Migration
{
    public function up()
    {
        Schema::table('web_patients_forms', function($table)
        {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('web_patients_forms', function($table)
        {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
}
