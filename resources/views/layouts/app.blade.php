<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pendataan Siswa dan Kelas')</title>
    <style>
        *{box-sizing:border-box}body{margin:0;font-family:Arial,sans-serif;background:#f1f5f9;color:#172033}
        header{background:#173b70;color:white;padding:22px 7%;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px}
        header h2{margin:0;font-size:21px}nav a{color:white;text-decoration:none;margin-left:18px;font-weight:bold}
        main{max-width:1150px;margin:32px auto;padding:0 18px}.panel{background:white;border-radius:12px;padding:24px;box-shadow:0 5px 22px #0f172a12}
        h1{margin-top:0;font-size:25px}.btn{display:inline-block;border:0;border-radius:7px;padding:9px 14px;background:#2563eb;color:white;text-decoration:none;cursor:pointer;font-size:14px}
        .btn.gray{background:#64748b}.btn.green{background:#15803d}.btn.red{background:#dc2626}.actions{display:flex;gap:7px;flex-wrap:wrap}
        table{width:100%;border-collapse:collapse;margin-top:18px}th,td{padding:12px;border-bottom:1px solid #e2e8f0;text-align:left}th{background:#eff6ff}
        label{display:block;margin:14px 0 6px;font-weight:bold}input,select,textarea{width:100%;padding:10px;border:1px solid #cbd5e1;border-radius:7px;font:inherit}
        .grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:14px}.alert{padding:12px;border-radius:7px;margin-bottom:15px;background:#dcfce7;color:#166534}.alert.error{background:#fee2e2;color:#991b1b}
        .field-error{color:#dc2626;font-size:13px}.muted{color:#64748b}@media(max-width:650px){.grid{grid-template-columns:1fr}header{padding:18px}nav a{margin:0 12px 0 0}table{font-size:13px}th,td{padding:8px}}
    </style>
</head>
<body>
<header>
    <h2>APLIKASI PENDATAAN SISWA & KELAS</h2>
    <nav><a href="{{ route('siswa.index') }}">Siswa</a><a href="{{ route('kelas.index') }}">Kelas</a></nav>
</header>
<main>
    @if(session('success'))<div class="alert">{{ session('success') }}</div>@endif
    @if(session('error'))<div class="alert error">{{ session('error') }}</div>@endif
    @if($errors->any())
        <div class="alert error"><strong>Periksa kembali input:</strong><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
    @endif
    @yield('content')
</main>
</body>
</html>
