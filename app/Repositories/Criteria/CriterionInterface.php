<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/18/18
 * Time: 6:00 PM
 */

namespace App\Repositories\Criteria;


interface CriterionInterface
{

    public function apply($entity);

}