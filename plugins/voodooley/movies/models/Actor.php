<?php namespace Voodooley\Movies\Models;

use Model;

/**
 * Model
 */
class Actor extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'voodooley_movies_actors';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /* Relations */

    public $belongsToMany = [
        'movies' => [
            Movie::class,
            'table' => 'voodooley_movies_actors_films',
            'otherKey' => 'film_id',
            'order' => 'name',
        ]
    ];

    public function getFullNameAttribute(): string
    {
        return $this->name . '&nbsp;' .$this->lastname;
    }
}
