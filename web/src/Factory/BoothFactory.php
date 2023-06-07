<?php

namespace App\Factory;

use App\Entity\Booth;
use App\Repository\BoothRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Booth>
 *
 * @method        Booth|Proxy create(array|callable $attributes = [])
 * @method static Booth|Proxy createOne(array $attributes = [])
 * @method static Booth|Proxy find(object|array|mixed $criteria)
 * @method static Booth|Proxy findOrCreate(array $attributes)
 * @method static Booth|Proxy first(string $sortedField = 'id')
 * @method static Booth|Proxy last(string $sortedField = 'id')
 * @method static Booth|Proxy random(array $attributes = [])
 * @method static Booth|Proxy randomOrCreate(array $attributes = [])
 * @method static BoothRepository|RepositoryProxy repository()
 * @method static Booth[]|Proxy[] all()
 * @method static Booth[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Booth[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Booth[]|Proxy[] findBy(array $attributes)
 * @method static Booth[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Booth[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class BoothFactory extends ModelFactory
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
            'booth_number' => self::faker()->randomDigit(),
            'title' => self::faker()->bs(),
            'description' => self::faker()->paragraph(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Booth $booth): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Booth::class;
    }
}
