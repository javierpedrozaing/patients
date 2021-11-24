<?php namespace web\Patients\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteWebPatientsUsers extends Migration
{
    public function up()
    {
        Schema::dropIfExists('web_patients_users');
    }
    
    public function down()
    {
        Schema::create('web_patients_users', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('names', 255);
            $table->string('last_names', 255);
            $table->integer('age');
            $table->string('cellphone', 255);
            $table->string('address', 255);
            $table->string('genre', 255);
            $table->string('email', 255);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
}
