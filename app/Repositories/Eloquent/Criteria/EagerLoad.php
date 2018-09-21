<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/19/18
 * Time: 8:09 AM
 */

namespace App\Repositories\Eloquent\Criteria;


use App\Repositories\Criteria\CriterionInterface;

class EagerLoad implements CriterionInterface
{
    /**
     * @var array
     */
    protected $relations;

    public function __construct(array $relations)
    {

        $this->relations = $relations;
    }

    public function apply($entity)
    {
        return $entity->with($this->relations);
    }
}