<?php

namespace App\Http\Controllers;

use App\Models\Land;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LandController extends Controller
{
    public function index(){
        return Land::all();
    }

    public function detail($id){
        return Land::find($id);
    }

    public function create(Request $req){
        $data = json_decode($req->getContent());


        $land = new Land();
        $land->city = $data->city;
        $land->description = $data->description;
        $land->img = $data->img;
        $land->size = $data->size;
        $land->cadastral_sheet = $data->cadastral_sheet;
        $land->cadastral_map = $data->cadastral_map;
        $land->cadastral_parcel = $data->cadastral_parcel;
        $land->ground_type = $data->ground_type;
        $land->watering_type = $data->watering_type;
        $land->offer_type = $data->offer_type;
        $land->price = $data->price;
        $land->available = $data->available;

        $land->save();

        return $land;
    }

    public function delete($id){
        Land::destroy($id);
    }

    public function edit(Request $req, $id){
        $data = json_decode($req->getContent());

        $land = Land::find($id);
        $land->city = $data->city;
        $land->description = $data->description;
        $land->img = $data->img;
        $land->size = $data->size;
        $land->cadastral_sheet = $data->cadastral_sheet;
        $land->cadastral_map = $data->cadastral_map;
        $land->cadastral_parcel = $data->cadastral_parcel;
        $land->ground_type = $data->ground_type;
        $land->watering_type = $data->watering_type;
        $land->offer_type = $data->offer_type;
        $land->price = $data->price;
        $land->available = $data->available;

        $land->save();

        return $land;
    }
}
