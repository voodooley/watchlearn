<?php namespace Voodooley\Contact;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
          'Voodooley\Contact\Components\ContactForm' => 'contactform',
        ];
    }

    public function registerSettings()
    {
    }
}
