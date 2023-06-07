<?php

namespace App\Mailer;

use App\Entity\Notification;
use Symfony\Component\Notifier\Message\SmsMessage;
use Symfony\Component\Notifier\TexterInterface;

class Texter
{
    private $texter;

    public function __construct(TexterInterface $texter)
    {
        $this->texter = $texter;
    }

    public function sendNotification(Notification $message): void
    {
        foreach ($message->getEvent()->getAttendees() as $attendee) {

            $phone_number = $attendee->getPhone();

            if ($this->checkPhoneNumberValidity($phone_number)) {

                $sms = new SmsMessage(
                    $phone_number,
                    'Hello ' . $attendee->getFirstname() . '! ' .
                        $message->getMessage(),
                    '+13204349320'
                );

                $this->texter->send($sms);
            }
        }
    }

    private function checkPhoneNumberValidity($number)
    {
        if (preg_match('/^\+[1-9]{1}[0-9]{3,14}$/', $number)) {
            return true;
        } else {
            return false;
        }
    }
}
