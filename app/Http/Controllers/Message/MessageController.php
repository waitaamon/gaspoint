<?php

namespace App\Http\Controllers\Message;

use App\DataTables\MessagesDataTable;
use App\Http\Requests\MessageRequest;
use App\Jobs\MessageClient;
use App\Repositories\Contracts\MessageRepository;
use App\Repositories\Contracts\StationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    /**
     * @var MessageRepository
     */
    protected $messages;
    /**
     * @var StationRepository
     */
    private $stations;

    /**
     * MessageController constructor.
     * @param MessageRepository $messages
     * @param StationRepository $stations
     */
    public function __construct(MessageRepository $messages, StationRepository $stations)
    {

        $this->messages = $messages;
        $this->stations = $stations;
    }

    public function index(MessagesDataTable $dataTable)
    {

        return $dataTable->render('admin.messages.index');

    }

    public function create()
    {
        $stations = $this->stations->all();

        return view('admin.messages.create', compact('stations'));
    }

    public function store(MessageRequest $request)
    {
        //authorize

        if ($request->station === 'all') {

            $message = $this->messages->create([
                'message' => $request->message
            ]);

            $stations = $this->stations->all();

            foreach ($stations as $station) {

                $this->stations->attachMessage($station->id, $message->id);

                MessageClient::dispatch($request->message, $station->id);
            }

        } else {

            $message = $this->messages->create([
                'message' => $request->message
            ]);

            $this->stations->attachMessage($request->station, $message->id);

            MessageClient::dispatch($request->message, $request->station);
        }

        return redirect()->route('message.index')
            ->withSuccess('Message sent successfully.');

    }

    public function show($id) {

        $message = $this->messages->find($id);

        return view('admin.messages.show', compact('message'));
    }

    public function destroy($id)
    {
        //authorize

        $this->messages->delete($id);

        return redirect()->route('message.index')
            ->withSuccess('message deleted successfully.');
    }
}
