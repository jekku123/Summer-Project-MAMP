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
            ->subject('Registration confirmation for ' . $attendee->getEvent()->getTitle())
            ->text('Super awesome')
            ->html('
            <h1>Hey ' . $attendee->getFirstname() . '!</h1>
            <p>Thank you for registering!</p>
            <p>Lets have a good one! :)</p>
            <br>
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
            <h1>Hey!</h1> 
            <p>We would like to invite you to our ' . $invite->getEvent()->getType() . ': ' . $invite->getEvent()->getTitle() . '</p>
            <p>Please fill the click the link at the bottom and sign up if you are gonna attend! :)</p>
            <p>Where: <span>' . $invite->getEvent()->getLocation() . '</span></ul>
            <p>When: <span>' . $invite->getEvent()->getStartAt()->format('d-m-Y H:i:') . '</span></p>
            <br>
            <a href="http://localhost:8007/signup/' . $id . '">Sign up here</a>
            <br><br>
            <small>-Business College-</small>
            ');

        $this->mailer->send($email);
    }
}
