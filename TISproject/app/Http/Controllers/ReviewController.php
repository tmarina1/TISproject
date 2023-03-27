<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function create(string $productId): View
    {
        $viewData = [];
        $viewData['productId'] = $productId;

        return view('review.create')->with('viewData', $viewData);
    }

    public function save(Request $request, string $productId): RedirectResponse
    {
        Review::validateReviewUser($request);
        $review = new Review;
        $userId = Auth::user()->getId();

        $review->setReview($request->get('review'));
        $review->setRate($request->get('rate'));
        $review->setUser($userId);
        $review->setProduct($productId);
        $review->save();

        return back();
    }
}
