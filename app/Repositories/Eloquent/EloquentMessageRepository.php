<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/21/18
 * Time: 11:17 AM
 */

namespace App\Repositories\Eloquent;

use App\Models\Message;
use App\Repositories\Contracts\MessageRepository;
use App\Repositories\RepositoryAbstract;

class EloquentMessageRepository extends RepositoryAbstract implements MessageRepository
{
    public function entity() {

        return Message::class;
    }
}