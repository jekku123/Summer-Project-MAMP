<?php

namespace App\Mailer;

use App\Entity\Attendee;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class Mailer
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendEmail(Attendee $attendee): void
    {
        $email = (new Email())
            ->from('business.college@bc.fi')
            ->to($attendee->getEmail())
            ->subject('Welcome to our event ' . $attendee->getFirstname() . '!')
            ->text('Super awesome')
            ->html('
            <h1>Thank you for registering!</h1>
            <p>Lets have a good one!</p>
            <small>-Business College-</small>
            ');

        $this->mailer->send($email);
    }
}
