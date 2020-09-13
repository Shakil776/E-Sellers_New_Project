<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Measurement;
use App\Product;
use Session;

class MeasurementController extends Controller
{
    //measurement
    public function measurementOption(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>";print_r($data);die();
            $this->validate($request, [
                'kamiz_shoulder' => 'required',
                'kamiz_neck' => 'required',
                'kamiz_bust' => 'required',
                'kamiz_waist' => 'required',
                'kamiz_hips' => 'required',
                'kamiz_length' => 'required',
                'kamiz_sleeve_length' => 'required',
                'kamiz_sleeve_around' => 'required',
                'kamiz_armhole' => 'required',
                'salwar_belt' => 'required',
                'salwar_thigh' => 'required',
                'salwar_calf' => 'required',
                'salwar_ankle_hem' => 'required',
                'salwar_length' => 'required'
            ]);

            
            $measurement = new Measurement;
            $measurement->kamiz_shoulder = $data['kamiz_shoulder'];
            $measurement->kamiz_neck = $data['kamiz_neck'];
            $measurement->kamiz_bust = $data['kamiz_bust'];
            $measurement->kamiz_waist = $data['kamiz_waist'];
            $measurement->kamiz_hips = $data['kamiz_hips'];
            $measurement->kamiz_length = $data['kamiz_length'];
            $measurement->kamiz_sleeve_length = $data['kamiz_sleeve_length'];
            $measurement->kamiz_sleeve_around = $data['kamiz_sleeve_around'];
            $measurement->kamiz_armhole = $data['kamiz_armhole'];
            $measurement->salwar_belt = $data['salwar_belt'];
            $measurement->salwar_thigh = $data['salwar_thigh'];
            $measurement->salwar_calf = $data['salwar_calf'];
            $measurement->salwar_ankle_hem = $data['salwar_ankle_hem'];
            $measurement->salwar_length = $data['salwar_length'];
            $measurement->save();

            Session::put('measurementDetailsId', $measurement->id);
            return redirect()->action('MeasurementController@updateMeasurementDetails');
            
        }
        return view('front-end.custom-category.measurement');
    }

    public function updateMeasurementDetails(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            
            if(!empty($data['update']) && $data['update'] == "update"){
                Measurement::where('id', $data['id'])->update(['kamiz_shoulder'=>$data['kamiz_shoulder'], 'kamiz_neck'=>$data['kamiz_neck'], 'kamiz_bust'=>$data['kamiz_bust'], 'kamiz_waist'=>$data['kamiz_waist'], 'kamiz_hips'=>$data['kamiz_hips'], 'kamiz_length'=>$data['kamiz_length'], 'kamiz_sleeve_length'=>$data['kamiz_sleeve_length'], 'kamiz_sleeve_around'=>$data['kamiz_sleeve_around'], 'kamiz_armhole'=>$data['kamiz_armhole'], 'salwar_belt'=>$data['salwar_belt'], 'salwar_thigh'=>$data['salwar_thigh'], 'salwar_calf'=>$data['salwar_calf'], 'salwar_ankle_hem'=>$data['salwar_ankle_hem'], 'salwar_length'=>$data['salwar_length']]);

                return redirect()->back()->with('success', 'Successfully Updated.');
            }
            
        }
        $measurementDetailsId = Session::get('measurementDetailsId');
        $measurementDetails = Measurement::findOrFail($measurementDetailsId);
        $product = Product::find(Session::get('chooseProduct')['product_id']);
        return view('front-end.custom-category.show_measurement', compact('measurementDetails', 'product'));
    }
}
