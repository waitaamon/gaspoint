<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/21/18
 * Time: 9:40 AM
 */

namespace App\Repositories\Eloquent;


use App\Models\Station;
use App\Repositories\Contracts\StationRepository;
use App\Repositories\RepositoryAbstract;

class EloquentStationRepository extends RepositoryAbstract implements StationRepository
{
    public function entity() {

        return Station::class;
    }

    public function createMessage(array $data, $id)
    {
       return $this->entity->find($id)->messages()->create($data);

    }
}