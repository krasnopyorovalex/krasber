<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class OrderConsultationSent
 * @package App\Mail
 */
class OrderConsultationSent extends Mailable
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
     * @return OrderConsultationSent
     */
    public function build(): OrderConsultationSent
    {
        return $this->from('noreply@krasber.ru')
            ->subject('Форма: консультация')
            ->view('emails.order_consultation', [
                'data' => $this->data
            ]);
    }
}
