<?php

namespace App\Http\Controllers;

use App\Models\Review;
use PDF;
use Illuminate\Http\Request;

class GeneratePDFController extends Controller
{
    public function generate($review_id)
    {
        $review = Review::findOrFail($review_id);
        $pdf = PDF::loadView('reviews.pdf', compact('review'));

        return $pdf->download('review-'.$review->id.'.pdf');
    }
}
