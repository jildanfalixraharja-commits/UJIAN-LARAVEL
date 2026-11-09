@extends('layouts.app')
@section('title', 'Edit Kelas')
@section('content')
<div class="panel"><h1>{{ 'Edit Kelas' }}</h1>
<form method="POST" action="{{ route('kelas.update', $kelas->id) }}">@csrf @if('PUT' === 'PUT') @method('PUT') @endif
<div class="grid">
<div><label>Kode Kelas</label><input name="kode_kelas" maxlength="20" required value="{{ old('kode_kelas', $kelas->kode_kelas ?? '') }}"></div>
<div><label>Nama Kelas</label><input name="nama_kelas" maxlength="50" required value="{{ old('nama_kelas', $kelas->nama_kelas ?? '') }}" placeholder="Contoh: X RPL 1"></div>
<div><label>Tingkat</label><input name="tingkat" maxlength="20" required value="{{ old('tingkat', $kelas->tingkat ?? '') }}" placeholder="X, XI, XII"></div>
<div><label>Tahun Ajaran</label><input name="tahun_ajaran" maxlength="20" required value="{{ old('tahun_ajaran', $kelas->tahun_ajaran ?? '2026/2027') }}"></div>
<div><label>Wali Kelas</label><input name="wali_kelas" maxlength="100" value="{{ old('wali_kelas', $kelas->wali_kelas ?? '') }}"></div>
</div><br><button class="btn">Simpan</button> <a class="btn gray" href="{{ route('kelas.index') }}">Kembali</a>
</form></div>
@endsection
