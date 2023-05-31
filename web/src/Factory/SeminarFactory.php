<?php

namespace App\Factory;

use App\Entity\Seminar;
use App\Repository\SeminarRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Seminar>
 *
 * @method        Seminar|Proxy create(array|callable $attributes = [])
 * @method static Seminar|Proxy createOne(array $attributes = [])
 * @method static Seminar|Proxy find(object|array|mixed $criteria)
 * @method static Seminar|Proxy findOrCreate(array $attributes)
 * @method static Seminar|Proxy first(string $sortedField = 'id')
 * @method static Seminar|Proxy last(string $sortedField = 'id')
 * @method static Seminar|Proxy random(array $attributes = [])
 * @method static Seminar|Proxy randomOrCreate(array $attributes = [])
 * @method static SeminarRepository|RepositoryProxy repository()
 * @method static Seminar[]|Proxy[] all()
 * @method static Seminar[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Seminar[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Seminar[]|Proxy[] findBy(array $attributes)
 * @method static Seminar[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Seminar[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class SeminarFactory extends ModelFactory
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
            'image' => self::faker()->image(),
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
            // ->afterInstantiate(function(Seminar $seminar): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Seminar::class;
    }
}
