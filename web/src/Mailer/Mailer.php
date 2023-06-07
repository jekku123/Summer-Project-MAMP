<?php

namespace App\Mailer;

use App\Entity\Attendee;
use App\Entity\Invite;
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

    public function sendInvite(Invite $invite): void
    {
        $id = $invite->getEvent()->getId();
        $email = (new Email())
            ->from('business.college@bc.fi')
            ->to($invite->getEmail())
            ->subject('Invite to: ' . $invite->getEvent()->getTitle())
            ->text('Please come')
            ->html('
            <h1>Please come to our ' . $invite->getEvent()->getType() . '</h1>
            <p>Lets have a good one!</p>
            <p>' . $invite->getEvent()->getStartAt()->format('Y-m-d H:i:s') . ' @ ' . $invite->getEvent()->getLocation() . '</p>
            <a href="http://localhost:8007/signup/' . $id . '">Sign up</a>
            <small>-Business College-</small>
            ');

        $this->mailer->send($email);
    }
}
