<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->string('status', 'pending')->toString();

        $reviews = Review::query()
            ->where('is_approved', $status === 'approved')
            ->with('order', 'user')
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('admin.reviews.index', [
            'reviews' => $reviews,
            'statusFilter' => $status,
        ]);
    }

    public function approve(Review $review)
    {
        $review->update(['is_approved' => true]);

        return back()->with('status', 'Review approved.');
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return back()->with('status', 'Review removed.');
    }
}
