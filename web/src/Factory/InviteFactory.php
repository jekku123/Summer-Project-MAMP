<?php

namespace App\Factory;

use App\Entity\Invite;
use App\Repository\InviteRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Invite>
 *
 * @method        Invite|Proxy create(array|callable $attributes = [])
 * @method static Invite|Proxy createOne(array $attributes = [])
 * @method static Invite|Proxy find(object|array|mixed $criteria)
 * @method static Invite|Proxy findOrCreate(array $attributes)
 * @method static Invite|Proxy first(string $sortedField = 'id')
 * @method static Invite|Proxy last(string $sortedField = 'id')
 * @method static Invite|Proxy random(array $attributes = [])
 * @method static Invite|Proxy randomOrCreate(array $attributes = [])
 * @method static InviteRepository|RepositoryProxy repository()
 * @method static Invite[]|Proxy[] all()
 * @method static Invite[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Invite[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Invite[]|Proxy[] findBy(array $attributes)
 * @method static Invite[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Invite[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class InviteFactory extends ModelFactory
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
            'email' => self::faker()->text(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Invite $invite): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Invite::class;
    }
}
