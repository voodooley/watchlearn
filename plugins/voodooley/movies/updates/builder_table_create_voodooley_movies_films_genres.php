<?php namespace Voodooley\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateVoodooleyMoviesFilmsGenres extends Migration
{
    public function up()
    {
        Schema::create('voodooley_movies_films_genres', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('film_id');
            $table->integer('genre_id');
            $table->primary(['film_id','genre_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('voodooley_movies_films_genres');
    }
}
