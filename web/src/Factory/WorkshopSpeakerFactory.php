<?php

namespace App\Factory;

use App\Entity\WorkshopSpeaker;
use App\Repository\WorkshopSpeakerRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<WorkshopSpeaker>
 *
 * @method        WorkshopSpeaker|Proxy create(array|callable $attributes = [])
 * @method static WorkshopSpeaker|Proxy createOne(array $attributes = [])
 * @method static WorkshopSpeaker|Proxy find(object|array|mixed $criteria)
 * @method static WorkshopSpeaker|Proxy findOrCreate(array $attributes)
 * @method static WorkshopSpeaker|Proxy first(string $sortedField = 'id')
 * @method static WorkshopSpeaker|Proxy last(string $sortedField = 'id')
 * @method static WorkshopSpeaker|Proxy random(array $attributes = [])
 * @method static WorkshopSpeaker|Proxy randomOrCreate(array $attributes = [])
 * @method static WorkshopSpeakerRepository|RepositoryProxy repository()
 * @method static WorkshopSpeaker[]|Proxy[] all()
 * @method static WorkshopSpeaker[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static WorkshopSpeaker[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static WorkshopSpeaker[]|Proxy[] findBy(array $attributes)
 * @method static WorkshopSpeaker[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static WorkshopSpeaker[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class WorkshopSpeakerFactory extends ModelFactory
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
            // ->afterInstantiate(function(WorkshopSpeaker $workshopSpeaker): void {})
        ;
    }

    protected static function getClass(): string
    {
        return WorkshopSpeaker::class;
    }
}
