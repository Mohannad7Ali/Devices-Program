<?php

namespace App\Http\Controllers;

use App\Interfaces\ClientsRequests\ClientsRequestRepositoryInterface;
use App\Models\ClientsRequest;
use App\Repositories\ClientsRequests\ClientsRequestRepository;
use Illuminate\Http\Request;

class ClientsRequestController extends Controller
{
    private $client_request;

    public function __construct(ClientsRequestRepositoryInterface $client_request)
    {
        $this->client_request = $client_request;
    }

    public function index(){
        return $this->client_request->index();
    }
}
