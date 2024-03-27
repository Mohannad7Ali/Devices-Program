<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\Devices\DeviceRepositoryInterface;

class DeviceController extends Controller
{
    private $device;

    public function __construct(DeviceRepositoryInterface $device)
    {
        $this->device = $device;
    }

    public function index()
    {
        return $this->device->index();
    }
    public function create()
    {
        return $this->device->create();
    }
    public function edit($id)
    {
        return $this->device->edit($id);
    }

    public function store(Request $request)
    {
        return $this->device->store($request);
    }

    public function update(Request $request)
    {
        return $this->device->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->device->destroy($request);
    }

}
