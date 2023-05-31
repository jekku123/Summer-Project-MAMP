<?php

namespace App\Factory;

use App\Entity\SideEvent;
use App\Repository\SideEventRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<SideEvent>
 *
 * @method        SideEvent|Proxy create(array|callable $attributes = [])
 * @method static SideEvent|Proxy createOne(array $attributes = [])
 * @method static SideEvent|Proxy find(object|array|mixed $criteria)
 * @method static SideEvent|Proxy findOrCreate(array $attributes)
 * @method static SideEvent|Proxy first(string $sortedField = 'id')
 * @method static SideEvent|Proxy last(string $sortedField = 'id')
 * @method static SideEvent|Proxy random(array $attributes = [])
 * @method static SideEvent|Proxy randomOrCreate(array $attributes = [])
 * @method static SideEventRepository|RepositoryProxy repository()
 * @method static SideEvent[]|Proxy[] all()
 * @method static SideEvent[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static SideEvent[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static SideEvent[]|Proxy[] findBy(array $attributes)
 * @method static SideEvent[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static SideEvent[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class SideEventFactory extends ModelFactory
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
            'title' => self::faker()->words(5, true),
            'description' => self::faker()->paragraph(),
            'location' => self::faker()->address(),
            'start_at' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
            'end_at' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(SideEvent $sideEvent): void {})
        ;
    }

    protected static function getClass(): string
    {
        return SideEvent::class;
    }
}
