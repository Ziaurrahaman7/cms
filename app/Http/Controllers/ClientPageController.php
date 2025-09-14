<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientPageController extends Controller
{
    public function index()
    {
        $clients = Client::active()->ordered()->get();
        
        return view('clients.index', compact('clients'));
    }
}