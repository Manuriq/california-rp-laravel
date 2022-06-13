<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Request;


class DashboardController extends Controller
{
    public function index()
    {

        return view('panel.index');
    }
}
