<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mail;
use Carbon\Carbon;
use DB;

use App\Http\Requests\Request as RequestRequest;

class RequestController extends Controller
{
    public function index(Request $request)
    {
        return view('request.index');
    }

    public function create()
    {
        return view('request.create');
    }
}
