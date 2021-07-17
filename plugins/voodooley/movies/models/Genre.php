<?php namespace Voodooley\Movies\Models;

use Model;

/**
 * Model
 */
class Genre extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'voodooley_movies_genres';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /*  Relations  */

    public $belongsToMany = [
      'movies' => [
          Movie::class,
          'table' => 'voodooley_movies_films_genres',
          'order' => 'title',
          'otherKey' => 'film_id'
      ]
    ];
}
