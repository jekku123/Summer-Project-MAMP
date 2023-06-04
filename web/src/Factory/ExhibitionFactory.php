<?php

namespace App\Factory;

use App\Entity\Exhibition;
use App\Repository\ExhibitionRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Exhibition>
 *
 * @method        Exhibition|Proxy create(array|callable $attributes = [])
 * @method static Exhibition|Proxy createOne(array $attributes = [])
 * @method static Exhibition|Proxy find(object|array|mixed $criteria)
 * @method static Exhibition|Proxy findOrCreate(array $attributes)
 * @method static Exhibition|Proxy first(string $sortedField = 'id')
 * @method static Exhibition|Proxy last(string $sortedField = 'id')
 * @method static Exhibition|Proxy random(array $attributes = [])
 * @method static Exhibition|Proxy randomOrCreate(array $attributes = [])
 * @method static ExhibitionRepository|RepositoryProxy repository()
 * @method static Exhibition[]|Proxy[] all()
 * @method static Exhibition[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Exhibition[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Exhibition[]|Proxy[] findBy(array $attributes)
 * @method static Exhibition[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Exhibition[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class ExhibitionFactory extends ModelFactory
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
            'description' => self::faker()->text(),
            'end_at' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
            'location' => self::faker()->text(100),
            'start_at' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
            'title' => self::faker()->text(100),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Exhibition $exhibition): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Exhibition::class;
    }
}
