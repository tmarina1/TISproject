<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Review;
use \Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create(string $pId): View
    { 
      $viewData = [];
      $viewData['productId'] = $pId;
      return view('review.create')->with('viewData',$viewData); 
    }

    public function save(Request $request, string $pId): RedirectResponse
    {
    Review::validateReviewUser($request);
    $review = new Review;
    $userId = Auth::user()->getId();
    
    $review->setReview($request->get('review'));
    $review->setRate($request->get('rate'));
    $review->setUser($userId);
    $review->setProduct($pId);
    $review->save();
    
    return back();
    }
}
