<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Notifier\Message\SmsMessage;
use Symfony\Component\Notifier\TexterInterface;
use Symfony\Component\Routing\Annotation\Route;

class SmsController extends AbstractController
{
    #[Route('/api/send-sms')]
    public function loginSuccess(TexterInterface $texter): Response
    {
        $sms = new SmsMessage(
            '+358405100040',
            'WOHOO!',
            '+13204349320'
        );

        $texter->send($sms);

        return $this->json('msg sent');
    }
}
