<?php

namespace  App\Interfaces\Devices;

interface DeviceRepositoryInterface
{
    public function index();
    public function create();
    public function edit($id);
    public function store($request);
    public function update($request);
    public function destroy($request);
}
