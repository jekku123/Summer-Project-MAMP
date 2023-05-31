<?php

namespace App\Factory;

use App\Entity\Conference;
use App\Repository\ConferenceRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Conference>
 *
 * @method        Conference|Proxy create(array|callable $attributes = [])
 * @method static Conference|Proxy createOne(array $attributes = [])
 * @method static Conference|Proxy find(object|array|mixed $criteria)
 * @method static Conference|Proxy findOrCreate(array $attributes)
 * @method static Conference|Proxy first(string $sortedField = 'id')
 * @method static Conference|Proxy last(string $sortedField = 'id')
 * @method static Conference|Proxy random(array $attributes = [])
 * @method static Conference|Proxy randomOrCreate(array $attributes = [])
 * @method static ConferenceRepository|RepositoryProxy repository()
 * @method static Conference[]|Proxy[] all()
 * @method static Conference[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Conference[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Conference[]|Proxy[] findBy(array $attributes)
 * @method static Conference[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Conference[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class ConferenceFactory extends ModelFactory
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
            'description' => self::faker()->paragraph(),
            'location' => self::faker()->address(),
            'image' => self::faker()->imageUrl(),
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
            // ->afterInstantiate(function(Conference $conference): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Conference::class;
    }
}
