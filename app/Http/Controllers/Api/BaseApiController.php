<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseApiController extends Controller
{
    //
    public function __construct()
    {
        auth()->setDefaultDriver('api');
    }
}
