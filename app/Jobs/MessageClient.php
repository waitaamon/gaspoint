<?php

namespace App\Jobs;

use AfricasTalking\SDK\AfricasTalking;
use App\Repositories\Contracts\ClientRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class MessageClient implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $message;
    protected $station;

    /**
     * Create a new job instance.
     *
     * @param $message
     * @param $station
     */
    public function __construct($message, $station)
    {
        //
        $this->message = $message;
        $this->station = $station;
    }

    /**
     * Execute the job.
     *
     * @param ClientRepository $clients
     * @return void
     */
    public function handle(ClientRepository $clients)
    {

        $username = env('AFRICASTALKING_USERNAME', '');
        $apiKey = env('AFRICASTALKING_API_KEY', '');

        $AT = new AfricasTalking($username, $apiKey);

        $sms = $AT->sms();

        $recipients =  [];

        $stationClients = $clients->findWhere('station_id', $this->station);

        foreach ($stationClients as $client) {

            array_push($recipients, $client->phone);
        }

        $response = $sms->send(array(
            "to" => $recipients,
            "message" => $this->message,
        ));

    }
}
