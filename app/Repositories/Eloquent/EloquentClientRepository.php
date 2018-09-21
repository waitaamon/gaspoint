<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/21/18
 * Time: 11:17 AM
 */

namespace App\Repositories\Eloquent;


use App\Models\Client;
use App\Repositories\Contracts\ClientRepository;
use App\Repositories\RepositoryAbstract;

class EloquentClientRepository extends RepositoryAbstract implements ClientRepository
{
    public function entity() {

        return Client::class;
    }
}