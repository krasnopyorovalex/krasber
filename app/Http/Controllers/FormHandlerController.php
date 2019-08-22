<?php

namespace App\Http\Controllers;

use App\Http\Requests\Forms\OrderConsultationRequest;
use App\Http\Requests\Forms\OrderServiceRequest;
use App\Http\Requests\Forms\OrderTariffRequest;
use App\Http\Requests\Forms\QuizRequest;
use App\Http\Requests\Forms\SubscribeRequest;
use App\Mail\OrderConsultationSent;
use App\Mail\OrderServiceSent;
use App\Mail\OrderTariffSent;
use App\Mail\QuizSent;
use App\Mail\SubscribeSent;
use Illuminate\Support\Facades\Mail;

class FormHandlerController extends Controller
{
    /**
     * @param OrderServiceRequest $request
     * @return array
     */
    public function orderService(OrderServiceRequest $request): array
    {
        Mail::to(['info@krasber.ru'])->send(new OrderServiceSent($request->all()));

        return [
            'message' => 'Благодарим за Вашу заявку. Наш менеджер свяжется с Вами в ближайшее время',
            'status' => 200
        ];
    }

    /**
     * @param OrderConsultationRequest $request
     * @return array
     */
    public function orderConsultation(OrderConsultationRequest $request): array
    {
        Mail::to(['info@krasber.ru'])->send(new OrderConsultationSent($request->all()));

        return [
            'message' => 'Благодарим за Вашу заявку. Наш менеджер свяжется с Вами в ближайшее время',
            'status' => 200
        ];
    }

    /**
     * @param OrderTariffRequest $request
     * @return array
     */
    public function orderTariff(OrderTariffRequest $request): array
    {
        Mail::to(['info@krasber.ru'])->send(new OrderTariffSent($request->all()));

        return [
            'message' => 'Благодарим за Вашу заявку. Наш менеджер свяжется с Вами в ближайшее время',
            'status' => 200
        ];
    }

    /**
     * @param SubscribeRequest $request
     * @return array
     */
    public function subscribe(SubscribeRequest $request): array
    {
        Mail::to(['info@krasber.ru'])->send(new SubscribeSent($request->all()));

        return [
            'message' => 'Спасибо, что подписались на получение новых материалов!',
            'status' => 200
        ];
    }

    /**
     * @param QuizRequest $request
     * @return array
     */
    public function quiz(QuizRequest $request): array
    {
        Mail::to(['info@krasber.ru'])->send(new QuizSent($request->all()));

        return [
            'message' => 'Спасибо! Мы вышлем Вам расчет в течении 12 часов',
            'status' => 200
        ];
    }
}
