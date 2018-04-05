<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\MapSearchAddress;
use Mapper;
use DB;


class AjaxController extends Controller
{
    //
    /**
     * post request processor
     *
     * @return map html
     */
     public function post(Request $request){
      $response = array(
          'status' => 'success',
          'msg' => $request->message,
      );

      //Mapper::map(53.381128999999990000, -1.470085000000040000);

      // search the location and find coordinate on map
      $mapper = Mapper::location($request->get('location'));

      // create coordinate object to save in DB
      /*$map = new Map([
        'addr' => $request->get('location'),
        'lat'  => $mapper->getLatitude(),
        'lng'  => $mapper->getLongitude()
      ]);
      // save location in DB
      $map->save();*/

      // create coordinate object to save in DB
      $map = new MapSearchAddress([
        'addr' => $request->get('location'),
        'lat'  => $mapper->getLatitude(),
        'lng'  => $mapper->getLongitude()
      ]);

      $map->save();

      //$queryData = DB::table('map_search_addresses')->where('addr', $request->get('location'))->first();


      // plot address on google map and add marker
      Mapper::map($mapper->getLatitude(),  $mapper->getLongitude(), ['zoom' => 16, 'center' => true, 'marker' => true, 'type' => 'roadmap']);

      // Mapper::map($queryData->lat,  $queryData->lat, ['zoom' => 16, 'center' => true, 'marker' => true, 'type' => 'roadmap']);

      // render the address on gogle map and return this html to post 
      //response
      return view('map');
   }
}
