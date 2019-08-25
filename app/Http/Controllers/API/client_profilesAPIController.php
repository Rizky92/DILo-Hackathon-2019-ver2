<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createclient_profilesAPIRequest;
use App\Http\Requests\API\Updateclient_profilesAPIRequest;
use App\Models\client_profiles;
use App\Repositories\client_profilesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
/**
 * Class client_profilesController
 * @package App\Http\Controllers\API
 */

class client_profilesAPIController extends AppBaseController
{
    /** @var  client_profilesRepository */
    private $clientProfilesRepository;

    public function __construct(client_profilesRepository $clientProfilesRepo)
    {
        $this->clientProfilesRepository = $clientProfilesRepo;
    }

    /**
     * Display a listing of the client_profiles.
     * GET|HEAD /clientProfiles
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $clientProfiles = $this->clientProfilesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($clientProfiles->toArray(), 'Client Profiles retrieved successfully');
    }

    /**
     * Store a newly created client_profiles in storage.
     * POST /clientProfiles
     *
     * @param Createclient_profilesAPIRequest $request
     *
     * @return Response
     */
    public function store(Createclient_profilesAPIRequest $request)
    {
        $input = $request->all();

        $clientProfiles = $this->clientProfilesRepository->create($input);

        return $this->sendResponse($clientProfiles->toArray(), 'Client Profiles saved successfully');
    }

    /**
     * Display the specified client_profiles.
     * GET|HEAD /clientProfiles/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var client_profiles $clientProfiles */
        $clientProfiles = $this->clientProfilesRepository->find($id);

        if (empty($clientProfiles)) {
            return $this->sendError('Client Profiles not found');
        }

        return $this->sendResponse($clientProfiles->toArray(), 'Client Profiles retrieved successfully');
    }

    /**
     * Update the specified client_profiles in storage.
     * PUT/PATCH /clientProfiles/{id}
     *
     * @param int $id
     * @param Updateclient_profilesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateclient_profilesAPIRequest $request)
    {
        $input = $request->all();

        /** @var client_profiles $clientProfiles */
        $clientProfiles = $this->clientProfilesRepository->find($id);

        if (empty($clientProfiles)) {
            return $this->sendError('Client Profiles not found');
        }

        $clientProfiles = $this->clientProfilesRepository->update($input, $id);

        return $this->sendResponse($clientProfiles->toArray(), 'client_profiles updated successfully');
    }

    /**
     * Remove the specified client_profiles from storage.
     * DELETE /clientProfiles/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var client_profiles $clientProfiles */
        $clientProfiles = $this->clientProfilesRepository->find($id);

        if (empty($clientProfiles)) {
            return $this->sendError('Client Profiles not found');
        }

        $clientProfiles->delete();

        return $this->sendResponse($id, 'Client Profiles deleted successfully');
    }

    public function post_api() {
        //$input = $this->clientUsersRepository->find(1);
        try {
            $request = $client->request('POST', 'https://api.thebigbox.id/sms-broadcast/1.0.0/send', [
                'json' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'x-api-key' => 'r1E7gTBkEt4peSqawKzGBVQTlNs6zdvP'
                ],
                'body' => [
                    'msisdns' => [
                        '082131609462',
                        '082151834997',
                        '082351232103',
                        '085654276202'
                    ],
                    'text' => 'TES API SMS Broadcast'
                ]
            ]);
            $response = $request->send();
            $result = json_decode($response);
            dd($result);
        } catch (RequestException $e) {
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse)
                echo Psr7\str($e->getResponse());
        }
    }
    
}
