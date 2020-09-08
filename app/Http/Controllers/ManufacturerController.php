<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;

class ManufacturerController extends Controller
{
    public function addManufacturer() {
    	return view('admin.manufacturer.add-manufacturer');
    }

    public function saveManufacturer(Request $request) {
        $this->validate($request, [
            'manufacturer_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'url' => 'required',
            'manufacturer_description' => 'required',
            'publication_status' => 'required'
        ]);

    	$manufacturer = new Manufacturer;
    	$manufacturer->manufacturer_name        = $request->manufacturer_name;
    	$manufacturer->url                      = $request->url;
    	$manufacturer->manufacturer_description = $request->manufacturer_description;
    	$manufacturer->publication_status       = $request->publication_status;
    	$manufacturer->save();
    	return redirect('/manufacturer/add')->with('message', 'Manufacturer Info Save Successfully.');
    }

    public function manageManufacturer() {
    	$manufacturers =  Manufacturer::all();
    	return view('admin.manufacturer.manage-manufacturer', ['manufacturers' => $manufacturers]);
    }

    public function unpublishedManufacturer($id) {
    	$manufacturer = Manufacturer::find($id);
    	$manufacturer->publication_status = 0;
    	$manufacturer->save();
    	return redirect('/manufacturer/manage')->with('message', 'Manufacturer Info Unpublished.');
    }

    public function publishedManufacturer($id) {
    	$manufacturer = Manufacturer::find($id);
    	$manufacturer->publication_status = 1;
    	$manufacturer->save();
    	return redirect('/manufacturer/manage')->with('message', 'Manufacturer Info Published.');
    }

    public function editManufacturer($id) {
    	$manufacturer = Manufacturer::find($id);
    	return view('admin.manufacturer.edit-manufacturer', ['manufacturer' => $manufacturer]);
    }

    public function updateManufacturer(Request $request) {
        $this->validate($request, [
            'manufacturer_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'url' => 'required',
            'manufacturer_description' => 'required',
            'publication_status' => 'required'
        ]);

    	$manufacturer = Manufacturer::find($request->manufacturer_id);
    	$manufacturer->manufacturer_name        = $request->manufacturer_name;
    	$manufacturer->url        = $request->url;
    	$manufacturer->manufacturer_description = $request->manufacturer_description;
    	$manufacturer->publication_status       = $request->publication_status;
    	$manufacturer->save();
    	return redirect('/manufacturer/manage')->with('message', 'Manufacturer Info Updated Successfully.');
    }

    public function deleteManufacturer($id) {
    	$manufacturer = Manufacturer::find($id);
    	$manufacturer->delete();
    	return redirect('/manufacturer/manage')->with('message', 'Manufacturer Info Deleted.');
    }
}
