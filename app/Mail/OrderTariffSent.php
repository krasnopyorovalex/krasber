<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class OrderTariffSent
 * @package App\Mail
 */
class OrderTariffSent extends Mailable
{
    use Queueable, SerializesModels;

    private $data;

    /**
     * OrderServiceSent constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return OrderTariffSent
     */
    public function build(): OrderTariffSent
    {
        return $this->from('noreply@krasber.ru')
            ->subject('Форма: заказ тарифа')
            ->view('emails.order_tariff', [
                'data' => $this->data
            ]);
    }
}
