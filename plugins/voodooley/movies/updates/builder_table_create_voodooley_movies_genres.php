<?php namespace Voodooley\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateVoodooleyMoviesGenres extends Migration
{
    public function up()
    {
        Schema::create('voodooley_movies_genres', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title');
            $table->string('slug');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('voodooley_movies_genres');
    }
}
