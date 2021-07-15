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
          'Voodooley\Movies\Models\Genre',
          'table' => 'voodooley_movies_films_genres',
          'order' => 'title',
          'key' => 'film_id'
      ]
    ];

    public $attachOne = [
      'poster' => 'System\Models\File'
    ];

    public $attachMany = [
        'gallery' => 'System\Models\File'
    ];
}
