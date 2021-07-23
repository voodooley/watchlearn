<?php namespace Voodooley\Movies;

use System\Classes\PluginBase;
use Voodooley\Movies\FormWidgets\Actorbox;

class Plugin extends PluginBase
{
    public function registerComponents(): array
    {
        return [
            'Voodooley\Movies\Components\Actors' => 'actors',
            'Voodooley\Movies\Components\ActorForm' => 'actorform'
        ];
    }

    public function registerFormWidgets(): array
    {
        return [
            Actorbox::class => 'actorbox'
        ];
    }

    public function registerSettings()
    {
    }
}
