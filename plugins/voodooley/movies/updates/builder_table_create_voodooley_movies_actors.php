<?php namespace Voodooley\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateVoodooleyMoviesActors extends Migration
{
    public function up()
    {
        Schema::create('voodooley_movies_actors', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->text('bio')->nullable();
            $table->dateTime('birthday')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('voodooley_movies_actors');
    }
}
