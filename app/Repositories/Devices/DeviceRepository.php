<?php

namespace App\Repositories\Devices;

use App\Interfaces\Devices\DeviceRepositoryInterface;
use App\Models\Category;
use App\Models\Device;

class DeviceRepository implements DeviceRepositoryInterface
{

    public function index()
    {
        $devices = Device::all();
        return view("Dashboard.Devices.index", compact("devices"));
    }
    public function create()
    {
        $categories = Category::all();
        return view("Dashboard.Devices.add", compact('categories'));
    }
    public function edit($id)
    {
        $device = Device::findorFail($id);
        $categories = Category::all();
        return view("Dashboard.Devices.edit", compact('categories','device'));
    }
    public function store($request)
    {
        Device::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'details' => $request->input('details'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
        ]);
        session()->flash('add');

        return redirect()->route('devices.index');
    }

    public function update($request)
    {
        $Device = Device::findorFail($request->id);
        $Device->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'details' => $request->input('details'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
        ]);
        session()->flash('edit');
        return redirect()->route('devices.index');
    }

    public function destroy($request)
    {
        Device::findorFail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('devices.index');
    }
}
