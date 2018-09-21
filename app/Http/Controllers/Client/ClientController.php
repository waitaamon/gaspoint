<?php

namespace App\Http\Controllers\Client;

use App\DataTables\ClientsDataTable;
use App\Http\Requests\ClientRequest;
use App\Repositories\Contracts\ClientRepository;
use App\Repositories\Contracts\StationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    /**
     * @var ClientRepository
     */
    protected $clients;
    /**
     * @var StationRepository
     */
    protected $stations;

    /**
     * ClientController constructor.
     * @param ClientRepository $clients
     * @param StationRepository $stations
     */
    public function __construct(ClientRepository $clients, StationRepository $stations)
    {

        $this->clients = $clients;
        $this->stations = $stations;
    }

    public function index(ClientsDataTable $dataTable)
    {

        return $dataTable->render('admin.clients.index');

    }

    public function create()
    {
        $stations = $this->stations->all();

        return view('admin.clients.create', compact('stations'));
    }

    public function store(ClientRequest $request)
    {
        //authorize

        $client = $this->clients->create([
            'station_id' => $request->station,
            'phone' => $request->phone
        ]);

        return redirect()->route('client.index')
            ->withSuccess('client registered successfully.');

    }

    public function edit($id)
    {
        $client = $this->clients->find($id);

        $stations = $this->stations->all();

        return view('admin.clients.edit', compact(['client', 'stations']));
    }

    public function update(ClientRequest $request, $id)
    {
        //authorize

        $client = $this->clients->update($id, [
            'station_id' => $request->station,
            'phone' => $request->phone
        ]);

        return redirect()->route('client.index')
            ->withSuccess('client successfully updated.');
    }

    public function destroy($id)
    {
        //authorize

        $this->clients->delete($id);

        return redirect()->route('client.index')
            ->withSuccess('client successfully deleted.');
    }
}
