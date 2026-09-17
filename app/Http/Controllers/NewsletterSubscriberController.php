<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsletterSubscriberRequest;
use App\Models\NewsletterSubscriber;

class NewsletterSubscriberController extends Controller
{
    public function store(StoreNewsletterSubscriberRequest $request)
    {
        NewsletterSubscriber::create($request->validated());

        return response()->json(['message' => 'Subscribed! Check your inbox for your 15% off code.']);
    }
}
