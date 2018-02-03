<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mail;
use Carbon\Carbon;
use DB;

class ContactController extends Controller //
{
    public function index()
    {
     
        return view('contact.index'); //'item.index' から改良 contactのディレクトリの中にindexがある
        
    }

}
