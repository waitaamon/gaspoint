<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/18/18
 * Time: 5:53 PM
 */

namespace App\Repositories\Criteria;


interface CriteriaInterface
{
    public function withCriteria(...$criteria);
}