<?php

namespace App\Http\Controllers;

use App\Models\ReviewModel;
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
        $Reviews = new ReviewModel();
        return view('review', ['reviews' => $Reviews->all()]);
    }

    static public function ActionOnReviewCheck(Request $Request)
    {
        $Valid = $Request->validate([
            'email' => 'required|min:5|max:50',
            'subject' => 'required|min:2|max:100',
            'message' => 'required|min:10|max:500',
        ]);

        $Review = new ReviewModel();
        $Review->email = $Request->input('email');
        $Review->subject = $Request->input('subject');
        $Review->message = $Request->input('message');
        $Review->save();

        return redirect()->route('review');
    }
}
