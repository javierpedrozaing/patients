<?php namespace web\Patients\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateWebPatientsPatient4 extends Migration
{
    public function up()
    {
        Schema::table('web_patients_patient', function($table)
        {
            $table->string('cellphone', 100)->nullable()->change();
            $table->date('birthday')->nullable()->change();
            $table->string('genre', 100)->nullable()->change();
            $table->string('address', 100)->nullable()->change();
            $table->integer('age')->nullable()->change();
            $table->string('document_type', 255)->nullable()->change();
            $table->string('document', 255)->nullable()->change();
            $table->string('country', 255)->nullable()->change();
            $table->string('city', 255)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('web_patients_patient', function($table)
        {
            $table->string('cellphone', 100)->nullable(false)->change();
            $table->date('birthday')->nullable(false)->change();
            $table->string('genre', 100)->nullable(false)->change();
            $table->string('address', 100)->nullable(false)->change();
            $table->integer('age')->nullable(false)->change();
            $table->string('document_type', 255)->nullable(false)->change();
            $table->string('document', 255)->nullable(false)->change();
            $table->string('country', 255)->nullable(false)->change();
            $table->string('city', 255)->nullable(false)->change();
        });
    }
}
