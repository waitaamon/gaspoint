<?php

namespace App\Http\Controllers\Station;

use App\DataTables\StationsDataTable;
use App\Http\Requests\StationRequest;
use App\Repositories\Contracts\StationRepository;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepository;

class StationController extends Controller
{
    /**
     * @var StationRepository
     */
    protected $stations;
    /**
     * @var UserRepository
     */
    protected $users;

    /**
     * StationController constructor.
     * @param StationRepository $stations
     */
    public function __construct(StationRepository $stations, UserRepository $users)
    {

        $this->stations = $stations;
        $this->users = $users;
    }

    public function index(StationsDataTable $dataTable)
    {

        return $dataTable->render('admin.stations.index');

    }

    public function create()
    {
        $managers = $this->users->unassignedManagers();

        return view('admin.stations.create', compact('managers'));
    }

    public function store(StationRequest $request)
    {
        //authorize

        $station = $this->stations->create([
            'user_id' => $request->manager,
            'name' => $request->name,
            'phone' => $request->phone
        ]);

        return redirect()->route('station.index')
            ->withSuccess('station registered successfully.');

    }

    public function edit($id)
    {

        $station = $this->stations->find($id);

        $managers = $this->users->unassignedManagers();

        return view('admin.stations.edit', compact(['station', 'managers']));
    }

    public function update(StationRequest $request, $id)
    {

        //authorize

        $manager = $this->stations->update($id, [
            'user_id' => $request->manager,
            'name' => $request->name,
            'phone' => $request->phone
        ]);

        return redirect()->route('station.index')
            ->withSuccess('station successfully updated.');
    }

    public function destroy($id)
    {
        //authorize

        $this->stations->delete($id);

        return redirect()->route('station.index')
            ->withSuccess('station successfully deleted.');
    }
}
