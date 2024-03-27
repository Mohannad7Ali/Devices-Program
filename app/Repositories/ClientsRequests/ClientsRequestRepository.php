<?php
namespace App\Repositories\ClientsRequests;

use App\Interfaces\ClientsRequests\ClientsRequestRepositoryInterface;
use App\Models\ClientsRequest;

class ClientsRequestRepository implements ClientsRequestRepositoryInterface {
    public function index() {
        $requests = ClientsRequest::all() ;
        return view('Dashboard.ClientsRequests.index' , compact('requests')) ;
    }
}
