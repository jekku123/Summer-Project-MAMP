<?php

namespace App\Factory;

use App\Entity\Attendee;
use App\Repository\AttendeeRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Attendee>
 *
 * @method        Attendee|Proxy create(array|callable $attributes = [])
 * @method static Attendee|Proxy createOne(array $attributes = [])
 * @method static Attendee|Proxy find(object|array|mixed $criteria)
 * @method static Attendee|Proxy findOrCreate(array $attributes)
 * @method static Attendee|Proxy first(string $sortedField = 'id')
 * @method static Attendee|Proxy last(string $sortedField = 'id')
 * @method static Attendee|Proxy random(array $attributes = [])
 * @method static Attendee|Proxy randomOrCreate(array $attributes = [])
 * @method static AttendeeRepository|RepositoryProxy repository()
 * @method static Attendee[]|Proxy[] all()
 * @method static Attendee[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Attendee[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Attendee[]|Proxy[] findBy(array $attributes)
 * @method static Attendee[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Attendee[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class AttendeeFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'email' => self::faker()->text(50),
            'registered_at' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Attendee $attendee): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Attendee::class;
    }
}
