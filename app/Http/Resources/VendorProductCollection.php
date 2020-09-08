<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Vendor;


class VendorProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    protected $vendor;


    public function setVendor($v){
        $this->vendor = $v;
        return  $this;
    }



    public function toArray($request)
    {
        return [
            'status' => 1,
            'message' => 'success',
            'base_url' => url('/')."/",
            'total' => $this->total(),
            'count' => $this->count(),
            'per_page' => $this->perPage(),
            'current_page' => $this->currentPage(),
            'total_pages' => $this->lastPage(),

            'vendor' => $this->vendor,

            'products' => $this->collection,
        ];
    }  


    public function toResponse($request)
    {
        return JsonResource::toResponse($request);
    }

}