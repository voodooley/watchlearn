<?php namespace Voodooley\Movies\Components;

use Cms\Classes\ComponentBase;
use Input;
use Validator;
use Redirect;
use Voodooley\Movies\Models\Actor;
use Flash;

class ActorForm extends ComponentBase
{
    public function componentDetails(): array
    {
        return [
            'name' => 'Форма актеров',
            'description' => 'Введите актера'
        ];
    }

    public function onSave()
    {
        $actor = new Actor();
        $actor->name = Input::get('name');
        $actor->lastname = Input::get('lastname');
        $actor->save();
        Flash::success('Актер добавлен!');
        return Redirect::back();
    }
}
