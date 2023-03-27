<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminReviewController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['reviews'] = Review::all();

        return view('admin.review.index')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Review::validate($request);
        $review = new Review;
        $review->setReview($request->get('review'));
        $review->setRate($request->get('rate'));
        $review->setUser($request->get('user_id'));
        $review->setProduct($request->get('product_id'));
        $review->save();

        return back();
    }

    public function update(string $id): View
    {
        $viewData = [];
        $viewData['review'] = Review::findOrFail($id);

        return view('admin.review.update')->with('viewData', $viewData);
    }

    public function saveUpdate(Request $request, string $id): RedirectResponse
    {
        Review::validate($request);
        $product = Review::findOrFail($id);
        $product->setReview($request->get('review'));
        $product->setRate($request->get('rate'));
        $product->setUser($request->get('user_id'));
        $product->setProduct($request->get('product_id'));
        $product->save();

        return redirect()->route('admin.review.index');
    }

    public function delete(string $id): RedirectResponse
    {
        try {
            $delete = Review::destroy($id);
        } catch (Exception) {
            $error = 'Error';
        }

        return redirect()->route('admin.review.index');
    }
}
