<?php namespace Voodooley\Movies\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Movies extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'    ];

    public string $listConfig = 'config_list.yaml';
    public string $formConfig = 'config_form.yaml';
    public string $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Voodooley.Movies', 'main-menu-item');
    }
}
