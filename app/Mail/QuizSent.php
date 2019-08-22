<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class QuizSent
 * @package App\Mail
 */
class QuizSent extends Mailable
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
        dd($data);
    }

    /**
     * @return QuizSent
     */
    public function build(): QuizSent
    {
        return $this->from('krasber.ru@ya.ru')
            ->subject('Форма: quiz')
            ->view('emails.quiz', [
                'data' => $this->data
            ]);
    }
}
