<?php namespace Voodooley\Contact\Components;

use Cms\Classes\ComponentBase;
use Input;
use Mail;
use Validator;
use Redirect;

class ContactForm extends ComponentBase
{
    public function componentDetails(): array
    {
        return [
            'name' => 'Контактная форма',
            'description' => 'Простая форма контактов'
        ];
    }

    public function onSend()
    {
        $validator = Validator::make(
            [
                'name' => Input::get('name'),
                'email' => Input::get('email')
            ],
            [
                'name' => 'required',
                'email' => 'required|email'
            ]
        );

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $vars = ['name' => Input::get('name'), 'email' => Input::get('email'), 'content' => Input::get('content')];

            Mail::send('voodooley.contact::mail.message', $vars, function ($message) {

                $message->to('admin@domain.tld', 'Admin Person');
                $message->subject('Новое сообщение из контактной формы');
            });
        }
    }
}
