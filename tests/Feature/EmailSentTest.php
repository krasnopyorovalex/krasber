<?php

namespace Tests\Feature;

use App\Mail\OrderConsultationSent;
use App\Mail\OrderServiceSent;
use App\Service;
use Tests\TestCase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EmailSentTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function send_order_form(): void
    {
        Mail::fake();

        $service = factory(Service::class)->create();

        $data = [
            'name' => 'Иван',
            'service' => $service->menu_name,
            'phone' => '+7 (978) 455-44-45',
            'email' => 'lora.palm@gmail.com'
        ];

        $response = $this->post(route('order.service.send'), $data);

        $response->assertJson(['message' => 'Благодарим за Вашу заявку. Наш менеджер свяжется с Вами в ближайшее время']);

        Mail::assertSent(OrderServiceSent::class, static function ($mail) {
            return $mail->hasTo('info@krasber.ru');
        });
    }

    /** @test */
    public function send_consultation_form(): void
    {
        Mail::fake();
        $data = [
            'name' => 'Иван',
            'phone' => '+7 (978) 455-44-45',
            'email' => 'lora.palm@gmail.com'
        ];

        $response = $this->post(route('order.consultation.send'), $data);

        $response->assertJson(['message' => 'Благодарим за Вашу заявку. Наш менеджер свяжется с Вами в ближайшее время']);

        Mail::assertSent(OrderConsultationSent::class, static function ($mail) {
            return $mail->hasTo('info@krasber.ru');
        });
    }
}
