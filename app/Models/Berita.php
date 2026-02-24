<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    // Nama tabel di database
    protected $table = 'bitcoin_news';

    // Primary key (default: id) → opsional kalau pakai id
    protected $primaryKey = 'id';

    // Karena tabel hanya punya created_at (tidak ada updated_at)
    public $timestamps = false;

    public function getTitleShortAttribute()
    {
        return Str::limit($this->title_raw, 70);
    }

    // Kolom yang boleh diisi mass assignment
    protected $fillable = [
        'title_raw',
        'title_clean',
        'source',
        'published_at_utc',
        'link',
        'sentiment_label',
        'sentiment_score',
        'created_at'
    ];

    // Cast tipe data (biar rapi)
    protected $casts = [
        'published_at_utc' => 'datetime',
        'created_at'       => 'datetime',
        'sentiment_score'  => 'float',
    ];
}
