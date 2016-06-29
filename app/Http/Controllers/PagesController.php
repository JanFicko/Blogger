<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{

    public function index(){
        return view('welcome');
    }

    public function about(){
        $name = 'Jan';
        $surname = ' <span style="color:red;">Ficko</span>';

        //return view('pages.about')->with('name', $name)->with('surname', $surname);
        return view('pages.about', compact('name', 'surname'));
    }

    public function contact(){

        $data = [];
        $data = [
            'first' => 'Jan',
            'other' => 'Drugo'
        ];

        $data['john'] = 'Janez';

        //return view('pages.contact')->with($data);
        return view('pages.contact', $data);
    }
}
