<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        /*$ip = $_SERVER['HTTP_CLIENT_IP'] 
            ? $_SERVER['HTTP_CLIENT_IP'] 
            : ($_SERVER['HTTP_X_FORWARDED_FOR'] 
                ? $_SERVER['HTTP_X_FORWARDED_FOR'] 
                : $_SERVER['REMOTE_ADDR']);
 
            if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN'; 
            
         
        dd($ipaddress); */ 

        $ip = $_SERVER["REMOTE_ADDR"];

        Auth()->user()->update([
            'cIp'=>$ip
        ]);

        $categories = Categorie::orderBy('order', 'ASC')->get();

        $forums = Forum::orderBy('order', 'ASC')->get();

        return view('panel.index');
    }
}
