<?php

namespace App\Factory;

use App\Entity\WorkshopAttendee;
use App\Repository\WorkshopAttendeeRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<WorkshopAttendee>
 *
 * @method        WorkshopAttendee|Proxy create(array|callable $attributes = [])
 * @method static WorkshopAttendee|Proxy createOne(array $attributes = [])
 * @method static WorkshopAttendee|Proxy find(object|array|mixed $criteria)
 * @method static WorkshopAttendee|Proxy findOrCreate(array $attributes)
 * @method static WorkshopAttendee|Proxy first(string $sortedField = 'id')
 * @method static WorkshopAttendee|Proxy last(string $sortedField = 'id')
 * @method static WorkshopAttendee|Proxy random(array $attributes = [])
 * @method static WorkshopAttendee|Proxy randomOrCreate(array $attributes = [])
 * @method static WorkshopAttendeeRepository|RepositoryProxy repository()
 * @method static WorkshopAttendee[]|Proxy[] all()
 * @method static WorkshopAttendee[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static WorkshopAttendee[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static WorkshopAttendee[]|Proxy[] findBy(array $attributes)
 * @method static WorkshopAttendee[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static WorkshopAttendee[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class WorkshopAttendeeFactory extends ModelFactory
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
            // ->afterInstantiate(function(WorkshopAttendee $workshopAttendee): void {})
        ;
    }

    protected static function getClass(): string
    {
        return WorkshopAttendee::class;
    }
}
