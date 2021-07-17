<?php namespace Voodooley\Movies\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Database\Eloquent\Collection;
use Voodooley\Movies\Models\Actor;

class Actors extends ComponentBase
{
    /**
     * @var Collection|Actor[]
     */
    public $actors;

    public function componentDetails(): array
    {
        return [
            'name'        => 'Список актеров',
            'description' => 'Настройки показа списка актеров'
        ];
    }

    public function defineProperties(): array
    {
        return [
            'result'    => [
                'title'             => 'Количество актеров',
                'description'       => 'Сколько актеров показывать на странице. 0 - все',
                'default'           => 0,
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'Разрешены только цифры'
            ],
            'sortOrder' => [
                'title'             => 'Сортировка',
                'description'       => 'Сортировка записей',
                'type'              => 'dropdown',
                'default'           => 'asc'
            ],
        ];
    }

    public function getSortOrderOptions(): array
    {
        return [
            'asc'           => 'Фамилия (по возрастанию)',
            'desc'          => 'Фамилия (по убыванию)',
        ];
    }

    public function onRun()
    {
        $this->actors = $this->loadActors();
    }

    protected function loadActors()
    {
        $query = Actor::all();

        if ($this->property('sortOrder') == 'asc') {
            $query = $query->sortBy('lastname');
        }

        if ($this->property('sortOrder') == 'desc') {
            $query = $query->sortByDesc('lastname');
        }

        if ($this->property('result') > 0) {
            $query = $query->take($this->property('result'));
        }


        return $query;
    }
}
