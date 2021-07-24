<?php namespace Voodooley\Contact\Components;

use AjaxException;
use Cms\Classes\ComponentBase;
use Flash;
use Input;
use Mail;
use Validator;
use Redirect;
use ValidationException;

class ContactForm extends ComponentBase
{
    public function componentDetails(): array
    {
        return [
            'name' => 'Контактная форма',
            'description' => 'Простая форма контактов'
        ];
    }

    public function defineProperties(): array
    {
        return [
            'email' => [
                'title'       => 'Email',
                'description' => 'Данный email будет использоваться для отправки всех заявок с формы.',
                'default'     => 'r.plokhikh@yandex.ru',
                'required'    => true,
            ]
        ];
    }

    /**
     * @throws AjaxException
     */
    public function onSend()
    {
        if (!Input::has('name') || empty(Input::get('name'))) {
            throw new AjaxException(['X_OCTOBER_ERROR_MESSAGE' => 'Вы должны указать свое имя']);
        }
        if (!Input::has('email') || empty(Input::get('email'))) {
            throw new AjaxException([ 'X_OCTOBER_ERROR_MESSAGE' => 'Вы должны указать email для связи' ]);
        }

        $data = [
            'name'       => e(Input::get('name')),
            'email'      => e(Input::get('email')),
        ];

        if (Input::has('content') && !empty(Input::get('content'))) {
            $data['content'] = e(Input::get('content'));
        }

        $email = $this->property('email');
        Mail::send('voodooley.contact::contactform.feedback', $data, function ($message) use ($email) {
            $message->to($email, 'Admin Person');
        });

        // Проверка успешно ли ушло письмо
        if (count(Mail::failures()) == 0) {
            Flash::success('Форма успешно отправлена!');
        } else {
            throw new AjaxException([ 'X_OCTOBER_ERROR_MESSAGE' => 'Произошла ошибка, попробуйте позже' ]);
        }
    }
}
