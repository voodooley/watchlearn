<?php namespace Voodooley\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateVoodooleyMoviesActorsFilms extends Migration
{
    public function up()
    {
        Schema::create('voodooley_movies_actors_films', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('actor_id')->unsigned();
            $table->integer('film_id')->unsigned();
            $table->primary(['actor_id','film_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('voodooley_movies_actors_films');
    }
}
