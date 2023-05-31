<?php

namespace App\Factory;

use App\Entity\SessionSpeaker;
use App\Repository\SessionSpeakerRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<SessionSpeaker>
 *
 * @method        SessionSpeaker|Proxy create(array|callable $attributes = [])
 * @method static SessionSpeaker|Proxy createOne(array $attributes = [])
 * @method static SessionSpeaker|Proxy find(object|array|mixed $criteria)
 * @method static SessionSpeaker|Proxy findOrCreate(array $attributes)
 * @method static SessionSpeaker|Proxy first(string $sortedField = 'id')
 * @method static SessionSpeaker|Proxy last(string $sortedField = 'id')
 * @method static SessionSpeaker|Proxy random(array $attributes = [])
 * @method static SessionSpeaker|Proxy randomOrCreate(array $attributes = [])
 * @method static SessionSpeakerRepository|RepositoryProxy repository()
 * @method static SessionSpeaker[]|Proxy[] all()
 * @method static SessionSpeaker[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static SessionSpeaker[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static SessionSpeaker[]|Proxy[] findBy(array $attributes)
 * @method static SessionSpeaker[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static SessionSpeaker[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class SessionSpeakerFactory extends ModelFactory
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
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(SessionSpeaker $sessionSpeaker): void {})
        ;
    }

    protected static function getClass(): string
    {
        return SessionSpeaker::class;
    }
}
