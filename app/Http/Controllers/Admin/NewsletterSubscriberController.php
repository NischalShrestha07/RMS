<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Symfony\Component\HttpFoundation\StreamedResponse;

class NewsletterSubscriberController extends Controller
{
    public function index()
    {
        return view('admin.newsletter-subscribers.index', [
            'subscribers' => NewsletterSubscriber::latest()->paginate(30),
        ]);
    }

    public function destroy(NewsletterSubscriber $newsletterSubscriber)
    {
        $newsletterSubscriber->delete();

        return redirect()->route('admin.newsletter-subscribers.index')->with('status', 'Subscriber removed.');
    }

    public function export(): StreamedResponse
    {
        return response()->streamDownload(function () {
            $out = fopen('php://output', 'w');
            fputcsv($out, ['Email', 'Subscribed At']);
            NewsletterSubscriber::orderBy('created_at')->each(function ($subscriber) use ($out) {
                fputcsv($out, [$subscriber->email, $subscriber->created_at->format('Y-m-d H:i:s')]);
            });
            fclose($out);
        }, 'newsletter-subscribers.csv');
    }
}
