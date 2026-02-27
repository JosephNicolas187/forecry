<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Carbon\Carbon;

class SentimentController extends Controller
{
    public function getSentiment($limit = 50)
    {
        $news = Berita::select(
            'title_raw',
            'link',
            'sentiment_label',
            'sentiment_score',
            'published_at_utc'
        )
            ->orderBy('published_at_utc', 'desc')
            ->take($limit)
            ->get();

        return $news;
    }

    public function getSentimentBeranda(Request $request)
    {
        $news = $this->getSentiment(5);
        return view('beranda', compact('news'));
    }

    public function getSentimentPrediksi(Request $request)
    {
        $news = $this->getSentiment(20);
        return view('prediksi', compact('news'));
    }


    public function getListBerita(Request $request)
    {
        $query = Berita::query();

        if ($request->filled('keyword')) {
            $query->where('title_raw', 'like', '%' . $request->keyword . '%');
        }

        if ($request->filled('start_date')) {
            $startDateTime = Carbon::parse(
                $request->start_date . ' ' . ($request->start_time ?? '00:00')
            )->subHours(7); // jika database UTC

            $query->where('published_at_utc', '>=', $startDateTime);
        }

        if ($request->filled('end_date')) {
            $endDateTime = Carbon::parse(
                $request->end_date . ' ' . ($request->end_time ?? '23:59')
            )->subHours(7);

            $query->where('published_at_utc', '<=', $endDateTime);
        }

        if ($request->filled('source')) {
            $query->whereIn('source', $request->source);
        }

        $news = $query->orderBy('published_at_utc', 'desc')->limit(100)->get();


        return view('/berita', compact('news'));
    }
}
