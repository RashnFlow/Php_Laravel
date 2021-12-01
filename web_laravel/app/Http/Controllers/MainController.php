<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    static public function ActionOnHome()
    {
        return view('home');
    }

    static public function ActionOnAbout()
    {
        return view('about');
    }

    static public function ActionOnReview()
    {
        return view('review');
    }

    static public function ActionOnReviewCheck(Request $Request)
    {
        $Valid = $Request->validate([
            'email' => 'required|min:5|max:50',
            'subject' => 'required|min:2|max:100',
            'message' => 'required|min:10|max:500',
        ]);
    }
}
