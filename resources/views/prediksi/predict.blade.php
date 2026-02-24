<!DOCTYPE html>
<html>
<head>
    <title>BTC Prediction</title>
    <style>
        body { font-family: Arial; background: #0f172a; color: white; padding: 40px; }
        .box { max-width: 400px; margin: auto; background: #020617; padding: 20px; border-radius: 8px; }
        input, select, button { width: 100%; margin-top: 10px; padding: 10px; }
        button { background: #22c55e; font-weight: bold; }
        pre { background: black; padding: 10px; }
    </style>
</head>
<body>

<div class="box">
    <h2>BTC Price Prediction</h2>

    <form method="POST" action="/">
        @csrf

        <input name="symbol" value="BTCUSDT" placeholder="Symbol">

        <select name="interval">
            <option value="15min">15 Menit</option>
            <option value="30min">30 Menit</option>
            <option value="1h">1 Jam</option>
            <option value="4h">4 Jam</option>
            <option value="12h">12 Jam</option>
        </select>

        <input name="lookback" type="number" value="60">

        <button type="submit">Predict</button>
    </form>

    @if(session('result'))
        <h3>Result</h3>
        <pre>{{ json_encode(session('result'), JSON_PRETTY_PRINT) }}</pre>
    @endif

    @if(session('error'))
        <h3 style="color:red;">Error</h3>
        <pre>{{ json_encode(session('error'), JSON_PRETTY_PRINT) }}</pre>
    @endif
</div>

</body>
</html>
