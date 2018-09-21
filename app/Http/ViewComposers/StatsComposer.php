<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/21/18
 * Time: 2:55 PM
 */

namespace App\Http\ViewComposers;


use App\Repositories\Contracts\ClientRepository;
use App\Repositories\Contracts\MessageRepository;
use App\Repositories\Contracts\StationRepository;
use App\Repositories\Contracts\UserRepository;
use Illuminate\View\View;

class StatsComposer
{
    /**
     * @var UserRepository
     */
    protected $users;
    /**
     * @var StationRepository
     */
    protected $stations;
    /**
     * @var MessageRepository
     */
    protected $messages;
    /**
     * @var ClientRepository
     */
    protected $clients;

    /**
     * StatsComposer constructor.
     * @param UserRepository $users
     * @param StationRepository $stations
     * @param MessageRepository $messages
     * @param ClientRepository $clients
     */
    public function __construct(UserRepository $users, StationRepository $stations, MessageRepository $messages, ClientRepository $clients)
    {

        $this->users = $users;
        $this->stations = $stations;
        $this->messages = $messages;
        $this->clients = $clients;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {

        $view->with('stations', $this->stations->count());

        $view->with('managers', $this->users->managersCount());

        $view->with('messages', $this->stations->count());

        $view->with('clients', $this->stations->count());

    }
}