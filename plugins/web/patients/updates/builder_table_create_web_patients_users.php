<?php namespace web\Patients\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateWebPatientsUsers extends Migration
{
    public function up()
    {
        Schema::create('web_patients_users', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('names');
            $table->string('last_names');
            $table->integer('age');
            $table->string('cellphone');
            $table->string('address');
            $table->string('genre');
            $table->string('email');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('web_patients_users');
    }
}
