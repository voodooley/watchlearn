<?php namespace Voodooley\Movies\Models;

use Model;

/**
 * Model
 */
class Movie extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'voodooley_movies_films';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];


    /*  Relations  */

    public $belongsToMany = [
      'genres' => [
          Genre::class,
          'table' => 'voodooley_movies_films_genres',
          'order' => 'title',
          'key' => 'film_id'
      ],
        'actors' => [
            Actor::class,
            'table' => 'voodooley_movies_actors_films',
            'key' => 'film_id',
            'order' => 'name',
        ]
    ];

    public $attachOne = [
      'poster' => 'System\Models\File'
    ];

    public $attachMany = [
        'gallery' => 'System\Models\File'
    ];
}
