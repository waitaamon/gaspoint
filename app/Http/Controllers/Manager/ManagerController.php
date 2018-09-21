<?php

namespace App\Http\Controllers\Manager;

use App\DataTables\ManagersDataTable;
use App\Http\Requests\ManagerRegistrationRequest;
use App\Repositories\Contracts\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Bouncer;

class ManagerController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $users;

    /**
     * ManagerController constructor.
     * @param UserRepository $users
     */
    public function __construct(UserRepository $users)
    {

        $this->users = $users;
    }

    public function index(ManagersDataTable $dataTable) {

        return $dataTable->render('admin.managers.index');

    }

    public function create() {

        return view('admin.managers.create');
    }

    public function store(ManagerRegistrationRequest $request) {

        //authorize

        $email = preg_replace('/\s+/', '', $request->name) . '@gaspoint.com';

        $manager = $this->users->create([
            'name' => $request->name,
            'email' => strtolower($email),
            'phone' => $request->phone,
            'password' => bcrypt($request->phone)
        ]);

        $manager->assign('manager');

        return redirect()->route('manager.index')
            ->withSuccess('manager registered successfully.');

    }

    public function edit($id) {

        $manager = $this->users->find($id);

        return view('admin.managers.edit', compact('manager'));
    }

    public function update(ManagerRegistrationRequest $request, $id) {

        //authorize

        $manager = $this->users->update($id, [
            'name' => $request->name,
            'phone' => $request->phone
        ]);

        return redirect()->route('manager.index')
            ->withSuccess('manager successfully updated.');
    }

    public function destroy($id) {

        //authorize

        $this->users->delete($id);

        return redirect()->route('manager.index')
            ->withSuccess('manager successfully deleted.');
    }
}
