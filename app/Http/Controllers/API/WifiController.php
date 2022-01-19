<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Wifi;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class WifiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wifi = Wifi::latest()->filter()->get();

        return response()->json($wifi, HttpFoundationResponse::HTTP_OK);

   }

}
