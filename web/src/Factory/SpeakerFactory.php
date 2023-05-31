<?php

namespace App\Factory;

use App\Entity\Speaker;
use App\Repository\SpeakerRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Speaker>
 *
 * @method        Speaker|Proxy create(array|callable $attributes = [])
 * @method static Speaker|Proxy createOne(array $attributes = [])
 * @method static Speaker|Proxy find(object|array|mixed $criteria)
 * @method static Speaker|Proxy findOrCreate(array $attributes)
 * @method static Speaker|Proxy first(string $sortedField = 'id')
 * @method static Speaker|Proxy last(string $sortedField = 'id')
 * @method static Speaker|Proxy random(array $attributes = [])
 * @method static Speaker|Proxy randomOrCreate(array $attributes = [])
 * @method static SpeakerRepository|RepositoryProxy repository()
 * @method static Speaker[]|Proxy[] all()
 * @method static Speaker[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Speaker[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Speaker[]|Proxy[] findBy(array $attributes)
 * @method static Speaker[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Speaker[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class SpeakerFactory extends ModelFactory
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
            'firstname' => self::faker()->firstNameMale(),
            'lastname' => self::faker()->lastName(),
            'bio' => self::faker()->sentence(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Speaker $speaker): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Speaker::class;
    }
}
