<?php namespace Voodooley\Profile;

use Backend;
use System\Classes\PluginBase;
use RainLab\User\Controllers\Users as UsersController;
use RainLab\User\Models\User as UserModel;

/**
 * Profile Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails(): array
    {
        return [
            'name'        => 'Profile',
            'description' => 'No description provided yet...',
            'author'      => 'Voodooley',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        UserModel::extend(function ($model) {
            $model->addFillable(['vk', 'bio']);
        });

        UsersController::extendFormFields(function ($form, $model, $context) {
            $form->addTabFields([
                'vk' => [
                    'label' => 'Vk',
                    'type' => 'text',
                    'tab' => 'profile'
                ],
                'bio' => [
                    'label' => 'Биография',
                    'type' => 'textarea',
                    'tab' => 'profile'
                ]
            ]);
        });
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Voodooley\Profile\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'voodooley.profile.some_permission' => [
                'tab' => 'Profile',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'profile' => [
                'label'       => 'Profile',
                'url'         => Backend::url('voodooley/profile/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['voodooley.profile.*'],
                'order'       => 500,
            ],
        ];
    }
}
