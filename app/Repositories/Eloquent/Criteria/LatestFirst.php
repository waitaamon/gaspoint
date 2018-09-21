<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/18/18
 * Time: 6:01 PM
 */

namespace App\Repositories\Eloquent\Criteria;


use App\Repositories\Criteria\CriterionInterface;

class LatestFirst implements CriterionInterface
{


    public function apply($entity)
    {
        return $entity->latest();
    }
}