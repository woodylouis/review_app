<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class showDocController extends Controller
{
    //
    public function showERD()
    {
        return view('documentation.erd');
    }
    
        public function showDOC()
    {
        return view('documentation.doc');
    }
    
        public function showTaskTwo()
    {
        return view('documentation.task_two');
    }
}
