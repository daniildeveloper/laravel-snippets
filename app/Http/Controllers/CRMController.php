<?php

namespace App\Http\Controllers;

use App\Product;
use AmoCRM\Handler;
use AmoCRM\Request as R;
use Illuminate\Support\Facades\DB;
use \AmoCRM\Contact;
use \AmoCRM\Lead;
use \AmoCRM\Note;
use \AmoCRM\Task;

class CRMController extends Controller
{
    public function crm()
    {
        $api = new Handler('nomadboom', 'raushanov@yahoo.com');
        dd($api->request(new R(R::INFO))->result);
    }

    /**
     * Отправляет заявки в amocrm
     * @param  string $leadName    имя клиента из формы
     * @param  array $leadTags    теги по сделке
     * @param  string $contactName имя клиента
     * @param  string $phone       номер телефона контакта
     * @param  array $contactTags контактовские теги
     * @param  string $message     сообщение
     * @param  string $email       почта
     * @return [type]              [description]
     */
    public function sendRequestWithLead($leadName, $leadTags, $contactName, $phone, $contactTags, $email = null)
    {
        try {
            $api = new Handler('nomadboom', 'raushanov@yahoo.com');

            /* Создаем сделку,
            $api->config содержит в себе массив конфига,
            который вы создавали в начале */
            $lead = new Lead();
            $lead
            /* Название сделки */
                ->setName($leadName)
                /* Назначаем ответственного менеджера */
                ->setResponsibleUserId($api->config['ResponsibleUserId'])
                /* Кастомное поле */
                // ->setCustomField(
                //     $api->config['LeadFieldCustom'], // ID поля
                //     $api->config['LeadFieldCustomValue1']// ID значения поля
                // )
                /* Теги. Строка - если один тег, массив - если несколько */
                ->setTags($leadTags)
                /* Статус сделки */
                ->setStatusId($api->config['LeadStatusId']);

            /* Отправляем данные в AmoCRM
            В случае успешного добавления в результате
            будет объект новой сделки */
            $api->request(new R(R::SET, $lead));

            /* Сохраняем ID новой сделки для использования в дальнейшем */
            $lead = $api->last_insert_id;

            /* Создаем контакт */
            $contact = new Contact();
            $contact
            /* Имя */
                ->setName($contactName)
                /* Назначаем ответственного менеджера */
                ->setResponsibleUserId($api->config['ResponsibleUserId'])
                /* Привязка созданной сделки к контакту */
                ->setLinkedLeadsId($lead)
                /* Кастомные поля */
                ->setCustomField(
                    $api->config['ContactFieldPhone'],
                    $phone, // Номер телефона
                    'MOB' // MOB - это ENUM для этого поля, список доступных значений смотрите в информации об аккаунте
                )

                /* Теги. Строка - если один тег, массив - если несколько */
                ->setTags($contactTags);

            if ($email != null) {
                $contact->setCustomField(
                    $api->config['ContactFieldEmail'],
                    $email, // Email
                    'WORK' // WORK - это ENUM для этого поля, список доступных значений смотрите в информации об аккаунте
                );
            }

            // /* Проверяем по емейлу, есть ли пользователь в нашей базе */
            // $api->request(new R(R::GET, ['query' => $email], ['contacts', 'list']));

            // /* Если пользователя нет, вернется false, если есть - объект пользователя */
            // $contact_exists = ($api->result) ? $api->result->contacts[0] : false;

            // /* Если такой пользователь уже есть - мержим поля */
            // if ($contact_exists) {
            //     $contact
            //     /* Указываем, что пользователь будет обновлен */
            //         ->setUpdate($contact_exists->id, $contact_exists->last_modified + 1)
            //         /* Ответственного менеджера оставляем кто был */
            //         ->setResponsibleUserId($contact_exists->responsible_user_id)
            //         /* Старые привязанные сделки тоже сохраняем */
            //         ->setLinkedLeadsId($contact_exists->linked_leads_id);
            // }

            /* Создаем заметку с сообщением из формы */
            // $note = new Note();
            // $note
            // /* Привязка к созданной сделке*/
            //     ->setElementId($lead)
            //     /* Тип привязки (к сделке или к контакту). Смотрите комментарии в Note.php */
            //     ->setElementType(Note::TYPE_LEAD)
            //     /* Тип заметки (здесь - обычная текстовая). Смотрите комментарии в Note.php */
            //     ->setNoteType(Note::COMMON)
            //     /* Текст заметки*/
            //     ->setText($message);

            /* Создаем задачу для менеджера обработать заявку */
            $task = new Task();
            $task
            /* Привязка к созданной сделке */
                ->setElementId($lead)
                /* Тип привязки (к сделке или к контакту) Смотрите комментарии в Task.php */
                ->setElementType(Task::TYPE_LEAD)
                /* Тип задачи. Смотрите комментарии в Task.php */
                ->setTaskType(Task::CALL)
                /* ID ответственного за задачу менеджера */
                ->setResponsibleUserId($api->config['ResponsibleUserId'])
                /* Дедлайн задачи */
                ->setCompleteTill(time() + 60 * 2)
                /* Текст задачи */
                ->setText('Обработать заявку');

            /* Отправляем все в AmoCRM */
            $api->request(new R(R::SET, $contact));
            $api->request(new R(R::SET, $note));
            $api->request(new R(R::SET, $task));
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function sendRequestWithPhoneAndName($contactName, $phone, $contactTags, $message)
    {
        try {
            $api = new Handler('nomadboom', 'raushanov@yahoo.com');
            /* Создаем контакт */
            $contact = new Contact();
            $contact
            /* Имя */
                ->setName($contactName)
                /* Назначаем ответственного менеджера */
                ->setResponsibleUserId($api->config['ResponsibleUserId'])
                /* Привязка созданной сделки к контакту */
                //->setLinkedLeadsId($lead)
                /* Кастомные поля */
                ->setCustomField(
                    $api->config['ContactFieldPhone'],
                    $phone, // Номер телефона
                    'MOB' // MOB - это ENUM для этого поля, список доступных значений смотрите в информации об аккаунте
                )

                /* Теги. Строка - если один тег, массив - если несколько */
                ->setTags($contactTags);

            // /* Проверяем по емейлу, есть ли пользователь в нашей базе */
            // $api->request(new R(R::GET, ['query' => $email], ['contacts', 'list']));

            // /* Если пользователя нет, вернется false, если есть - объект пользователя */
            // $contact_exists = ($api->result) ? $api->result->contacts[0] : false;

            // /* Если такой пользователь уже есть - мержим поля */
            // if ($contact_exists) {
            //     $contact
            //     /* Указываем, что пользователь будет обновлен */
            //         ->setUpdate($contact_exists->id, $contact_exists->last_modified + 1)
            //         /* Ответственного менеджера оставляем кто был */
            //         ->setResponsibleUserId($contact_exists->responsible_user_id)
            //         /* Старые привязанные сделки тоже сохраняем */
            //         ->setLinkedLeadsId($contact_exists->linked_leads_id);
            // }

            // /* Создаем заметку с сообщением из формы */
            // $note = new Note();
            // $note
            // /* Привязка к созданной сделке*/
            //     ->setElementId($lead)
            //      Тип привязки (к сделке или к контакту). Смотрите комментарии в Note.php 
            //     ->setElementType(Note::TYPE_LEAD)
            //     /* Тип заметки (здесь - обычная текстовая). Смотрите комментарии в Note.php */
            //     ->setNoteType(Note::COMMON)
            //     /* Текст заметки*/
            //     ->setText($message);
            $api->request(new R(R::SET, $contact));
            $lead = $api->last_insert_id;

            /* Создаем задачу для менеджера обработать заявку */
            $task = new Task();
            $task
            /* Привязка к созданной сделке */
                ->setElementId($lead)
                /* Тип привязки (к сделке или к контакту) Смотрите комментарии в Task.php */
                ->setElementType(Task::TYPE_LEAD)
                /* Тип задачи. Смотрите комментарии в Task.php */
                ->setTaskType(Task::CALL)
                /* ID ответственного за задачу менеджера */
                ->setResponsibleUserId($api->config['ResponsibleUserId'])
                /* Дедлайн задачи */
                ->setCompleteTill(time() + 60 * 2)
                /* Текст задачи */
                ->setText('Обработать заявку');

            /* Отправляем все в AmoCRM */
            
            // $api->request(new R(R::SET, $note));
            $api->request(new R(R::SET, $task));
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }


    public function sendFromHeader(Request $request) {
    	$name = $request['name'];
    	$phone = $request['phone'];
    	$this->sendRequestWithPhoneAndName($name, $phone, ['header', 'сайт'], ' ');
    	return redirect()->back();
    }

    public function sendFromBanner(Request $request) {
    	$name = $request['name'];
    	$phone = $request['phone'];
    	$this->sendRequestWithPhoneAndName($name, $phone, ['banner', 'сайт'], ' ');
    	return redirect()->back();
    }

    public function sendFromSingle($product_id, Request $request) {
    	$product = Product::find($product_id);

    	$this->sendRequestWithPhoneAndName($request['name'], $request['phone'], ['продукт', "$product->name"], 'Хочу узнать стоимость продукта' . $product->name);
    }
}
