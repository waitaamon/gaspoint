<?php

namespace App\Http\Controllers\Station;

use App\DataTables\StationsDataTable;
use App\Http\Requests\StationRequest;
use App\Repositories\Contracts\StationRepository;
use App\Http\Controllers\Controller;

class StationController extends Controller
{
    /**
     * @var StationRepository
     */
    protected $stations;

    /**
     * StationController constructor.
     * @param StationRepository $stations
     */
    public function __construct(StationRepository $stations)
    {

        $this->stations = $stations;
    }

    public function index(StationsDataTable $dataTable)
    {

        return $dataTable->render('admin.stations.index');

    }

    public function create()
    {

        return view('admin.stations.create');
    }

    public function store(StationRequest $request)
    {

        //authorize

        $station = $this->stations->create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'phone' => $request->phone
        ]);

        return redirect()->route('station.index')
            ->withSuccess('station registered successfully.');

    }

    public function edit($id)
    {

        $station = $this->stations->find($id);

        return view('admin.station.edit', compact('station'));
    }

    public function update(StationRequest $request, $id)
    {

        //authorize

        $manager = $this->stations->update($id, [
            'user_id' => $request->user_id,
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

        return redirect()->route('manager.index')
            ->withSuccess('station successfully deleted.');
    }
}
