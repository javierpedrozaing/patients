<?php namespace web\Patients\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateWebPatientsUsers2 extends Migration
{
    public function up()
    {
        Schema::create('web_patients_users', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('cellphone', 100);
            $table->date('birthday');
            $table->string('genre', 100);
            $table->string('address', 100);
            $table->integer('user_id');
            $table->integer('age');
            $table->string('document_type');
            $table->string('document');
            $table->string('country');
            $table->string('city');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('web_patients_users');
    }
}
