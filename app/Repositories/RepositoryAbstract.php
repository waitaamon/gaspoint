<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/18/18
 * Time: 5:05 PM
 */

namespace App\Repositories;


use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Criteria\CriteriaInterface;
use App\Repositories\Exceptions\NoEntityDefined;

abstract class RepositoryAbstract implements RepositoryInterface, CriteriaInterface
{
    protected $entity;

    public function __construct()
    {
        $this->entity = $this->resolveEntity();

    }

    public function all()
    {

        return $this->entity->get();
    }

    public function find($id)
    {

        return $this->entity->findOrFail($id);
    }

    public function findWhere($column, $value)
    {

        return $this->entity->where($column, $value)->get();
    }

    public function findWhereFirst($column, $value)
    {

        return $this->entity->where($column, $value)->firstOrFail();
    }

    public function paginate($perPage = 10)
    {

        return $this->entity->paginate($perPage);
    }

    public function create(array $properties)
    {

        return $this->entity->create($properties);
    }

    public function update($id, array $properties)
    {

        return $this->find($id)->update($properties);
    }

    public function delete($id)
    {

        return $this->find($id)->delete();
    }

    public function withCriteria(...$criteria)
    {
        $criteria = array_flatten($criteria);


        foreach ($criteria as $criterion) {

            $this->entity = $criterion->apply($this->entity);

        }

        return $this;
    }

    public function resolveEntity() {

        if(!method_exists($this, 'entity')) {

            throw new NoEntityDefined('No Entity defined');
        }

        return app()->make($this->entity());
    }



}