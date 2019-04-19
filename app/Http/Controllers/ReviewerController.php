<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User; // or use Illuminate\Foundation\Auth\User; works too
use Illuminate\Support\Facades\Auth;
use App\Review;

class ReviewerController extends Controller {
   public function dashboard() {
       //return view('pages.restaurants'); 
   }


    public function addReview($restaurant_id, $reviewer_id, Request $request) {
         Review::create([
             'tagline' => $request->input('tagline'),
             'content' => $request->input('content'),
             'rating' => $request->input('rating'),
             'restaurant_id' => $restaurant_id,
             'reviewer_id' => $reviewer_id
         ]);

        return redirect('/addReview')->with('added_review_success_message',
            'You have successfully submitted your review!');
    }

    public function changePassword() {
        return view('auth.passwords.reset', ['token' => csrf_token()] );

    }

    public function myReviews() {
        $myReviews = Review::all()->where('reviewer_id', '=', Auth::user()->id);
        return view('pages.myReviews', ['myReviews' => $myReviews]);
    }



}
