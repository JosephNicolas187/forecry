<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

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
            $query->whereDate('published_at_utc', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('published_at_utc', '<=', $request->end_date);
        }

        if ($request->filled('source')) {
            $query->whereIn('source', $request->source);
        }

        $news = $query->orderBy('published_at_utc', 'desc')->limit(100)->get();


        return view('/berita', compact('news'));
    }
}
