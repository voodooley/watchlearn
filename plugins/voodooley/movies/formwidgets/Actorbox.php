<?php namespace Voodooley\Movies\FormWidgets;

use Backend\Classes\FormWidgetBase;
use Config;
use SystemException;
use Voodooley\Movies\Models\Actor;

class Actorbox extends FormWidgetBase
{
    public function widgetDetails(): array
    {
        return [
           'name' => 'Actorbox',
           'description' => 'Field for adding actors'
        ];
    }

    /**
     * @throws SystemException
     */
    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('widget');
    }

    public function prepareVars()
    {
        $this->vars['id'] = $this->model->id;
        $this->vars['actors'] = Actor::all()->lists('full_name', 'id');
        $this->vars['name'] = $this->formField->getName().'[]';
        $this->vars['selectedValues'] = $this->getLoadValue() ?? [];
    }

    public function getSaveValue($actors)
    {
        $newArray = [];

        foreach ($actors as $actorID) {
            if (!is_numeric($actorID)) {
                $newActor = new Actor;
                $nameLastname = explode('|', $actorID);
                if (count($nameLastname) > 1) {
                    $newActor->name = $nameLastname[0];
                    $newActor->lastname = $nameLastname[1];
                } else {
                    $newActor->name = $nameLastname[0];
                }

                $newActor->save();
                $newArray[] = $newActor->id;
            } else {
                $newArray[] = $actorID;
            }
        }

        return $newArray;
    }

    public function loadAssets()
    {
        $this->addCss('css/select2.css');
        $this->addJs('js/select2.js');
    }
}
