<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/18/18
 * Time: 4:59 PM
 */

namespace App\Repositories\Eloquent;


use App\Models\User;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\RepositoryAbstract;

class EloquentUserRepository extends RepositoryAbstract implements UserRepository
{

    public function entity() {

        return User::class;
    }

    public function managers()
    {
        return $this->entity->whereIs('manager')->get();
    }
}