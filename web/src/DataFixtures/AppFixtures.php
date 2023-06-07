<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Factory\AttendeeFactory;
use App\Factory\BoothFactory;
use App\Factory\CompanyFactory;
use App\Factory\EventFactory;
use App\Factory\InviteFactory;
use App\Factory\FeedbackFactory;
use App\Factory\ExhibitionFactory;
use App\Factory\SessionFactory;
use App\Factory\SideEventFactory;
use App\Factory\SpeakerFactory;
use App\Factory\UserFactory;
use App\Factory\WorkshopFactory;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        UserFactory::createone();

        EventFactory::createMany(3, static function (int $i) {
            return [
                'type' => 'conference', // Set the type as a string value
                'title' => "Conference $i",
                'invites' => InviteFactory::createMany(70),
                'attendees' => AttendeeFactory::createMany(50),
                'speakers' => SpeakerFactory::createMany(12),
                'sideEvents' => SideEventFactory::createMany(3),
                'feedback' => FeedbackFactory::createMany(10, ['attendee' => AttendeeFactory::random()]),
                'exhibitions' => ExhibitionFactory::createMany(
                    1,
                    function () {
                        return ['booths' => BoothFactory::createMany(5, ['company' => CompanyFactory::new()])];
                    }
                ),
                'sessions' => SessionFactory::createMany(4, function () {
                    return ['speakers' => SpeakerFactory::randomSet(2)];
                }),

                'workshops' => WorkshopFactory::createMany(2, function () {
                    return [
                        'speakers' => SpeakerFactory::randomSet(2),
                        'attendees' => AttendeeFactory::randomSet(15),
                    ];
                })


            ];
        });

        EventFactory::createMany(3, static function (int $i) {
            return [
                'type' => 'seminar',
                'title' => "Seminar $i",
                'attendees' => AttendeeFactory::createMany(30),
                'sessions' => SessionFactory::createMany(3, function () {
                    return ['speakers' => SpeakerFactory::createMany(2)];
                }),
            ];
        });


        $manager->flush();
    }
}
