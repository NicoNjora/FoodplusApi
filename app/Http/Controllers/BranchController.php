<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
use App\Http\Resources\BranchResource;
use App\Http\Resources\BranchResourceCollection;

class BranchController extends Controller
{
    //

    public function add(Request $request)
    {

        $name = $request['name'];
        $latitude = $request['latitude'];
        $longitude = $request['longitude'];

        $branch = new Branch;

        $branch->name = $name;
        $branch->latitude = $latitude;
        $branch->longitude = $longitude;

        $branch->save();

        return new BranchResource($branch);
    }

    public function index(){

        BranchResource::withoutWrapping();
        return new BranchResourceCollection(BranchResource::collection(Branch::all()));
    }
}
