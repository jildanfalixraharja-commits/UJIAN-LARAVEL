@extends('layouts.app')
@section('title', 'Tambah Kelas')
@section('content')
<div class="panel"><h1>{{ 'Tambah Kelas' }}</h1>
<form method="POST" action="{{ route('kelas.store') }}">@csrf @if('' === 'PUT') @method('PUT') @endif
<div class="grid">
<div><label>Kode Kelas</label><input name="kode_kelas" maxlength="20" required value="{{ old('kode_kelas', $item->kode_kelas ?? '') }}"></div>
<div><label>Nama Kelas</label><input name="nama_kelas" maxlength="50" required value="{{ old('nama_kelas', $item->nama_kelas ?? '') }}" placeholder="Contoh: X RPL 1"></div>
<div><label>Tingkat</label><input name="tingkat" maxlength="20" required value="{{ old('tingkat', $item->tingkat ?? '') }}" placeholder="X, XI, XII"></div>
<div><label>Tahun Ajaran</label><input name="tahun_ajaran" maxlength="20" required value="{{ old('tahun_ajaran', $item->tahun_ajaran ?? '2026/2027') }}"></div>
<div><label>Wali Kelas</label><input name="wali_kelas" maxlength="100" value="{{ old('wali_kelas', $item->wali_kelas ?? '') }}"></div>
</div><br><button class="btn">Simpan</button> <a class="btn gray" href="{{ route('kelas.index') }}">Kembali</a>
</form></div>
@endsection
