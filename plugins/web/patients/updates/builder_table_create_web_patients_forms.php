<?php namespace web\Patients\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateWebPatientsForms extends Migration
{
    public function up()
    {
        Schema::create('web_patients_forms', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->text('info');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('web_patients_forms');
    }
}
