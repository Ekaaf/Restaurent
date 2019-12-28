<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Response; 
class RestaurantController extends Controller
{

    public function getRestaurants(Request $request){
        $restaurantEntity = Restaurant::orderByRaw("FIELD(open , '1', '2', '0') ASC");
        if($request->version == '5.12.300'){
            $restaurantEntity->select('*','name as RestaurantName');
        }
        if($request->columnName && $request->orderType){
            $restaurantEntity->orderBy($request->columnName,$request->orderType);
        }
        if($request->name){
            $restaurantEntity->where('name',$request->name);
        }
        $restaurants = $restaurantEntity->get()->toArray();
        return Response::json([
                'restaurants' => $restaurants
            ], 201);
    }

}
