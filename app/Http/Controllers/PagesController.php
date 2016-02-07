<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function about() {
        $people = [
          'A', 'B', 'C'  
        ];
        $first = 'Uva';
        $last = 'Prakash P';
        
        return view('pages.about', compact('people', 'first', 'last'));    
        /*
        return view('pages.about')->with([
            'first' => 'Uva',
            'last' => 'Prakash P'
            
        ]);
        */

    }
    
    public function contact() {
        return view('pages.contact');
    }
}