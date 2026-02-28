<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PredictController extends Controller
{
    public function predict(Request $request)
    {
        try {
            $response = Http::post('http://127.0.0.1:9191/predict', [
                'symbol'   => 'BTCUSDT',
                'interval' => $request->interval,
                'lookback' => $this->getLookback($request->interval),
                'mode'     => $request->mode ?? 'next'
            ]);

            $data = $response->json();

            if (!isset($data['predicted_close'])) {
                return back()->with('error', 'Response ML tidak valid');
            }

            return response()->json([
                'predicted_close' => $data['predicted_close'],
                'predicted_time' => $data['predicted_time'],
                'last_close' => $data['last_close'],
                'last_time' => $data['last_time'],
                'interval' => $data['interval']
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan'], 422);
        }
    }

    private function getLookback($interval)
    {
        return match ($interval) {
            '30min' => 40,
            '1h', '4h', '12h' => 20,
            default => 60
        };
    }
}
