<?php

namespace App\DataFixtures;

use App\Factory\AttendeeFactory;
use App\Factory\BoothFactory;
use App\Factory\CompanyFactory;
use App\Factory\ConferenceFactory;
use App\Factory\ExhibitionFactory;
use App\Factory\SeminarFactory;
use App\Factory\SessionFactory;
use App\Factory\SessionSpeakerFactory;
use App\Factory\SpeakerFactory;
use App\Factory\UserFactory;
use App\Factory\WorkshopAttendeeFactory;
use App\Factory\WorkshopFactory;
use App\Factory\WorkshopSpeakerFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        UserFactory::createone();

        ConferenceFactory::createMany(5, static function (int $i) {
            return [
                'title' => "Conference $i",
                'attendees' => AttendeeFactory::createMany(50),
                'exhibitions' => ExhibitionFactory::createMany(
                    2,
                    function () {
                        return ['booths' => BoothFactory::createMany(2, ['company' => CompanyFactory::new()])];
                    }
                ),
                'sessions' => SessionFactory::createMany(5, function () {
                    return ['sessionSpeakers' => SessionSpeakerFactory::createMany(3, ['speaker' => SpeakerFactory::new()])];
                }),
                'workshops' => WorkshopFactory::createMany(2, function () {
                    return [
                        'workshopSpeakers' => WorkshopSpeakerFactory::createMany(2, ['speaker' => SpeakerFactory::new()]),
                        'workshopAttendees' => WorkshopAttendeeFactory::createMany(8, ['attendee' => AttendeeFactory::random()]),
                    ];
                })


            ];
        });

        SeminarFactory::createMany(5, static function (int $i) {
            return [
                'title' => "Seminar $i",
                'attendees' => AttendeeFactory::createMany(30),
                'sessions' => SessionFactory::createMany(5, function () {
                    return ['sessionSpeakers' => SessionSpeakerFactory::createMany(3, ['speaker' => SpeakerFactory::new()])];
                }),
            ];
        });


        $manager->flush();
    }
}
