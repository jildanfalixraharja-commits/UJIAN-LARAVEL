@extends('layouts.app')
@section('title','Detail Kelas')
@section('content')
<div class="panel"><h1>{{ $kelas->nama_kelas }}</h1>
<p><b>Kode:</b> {{ $kelas->kode_kelas }}</p><p><b>Tingkat:</b> {{ $kelas->tingkat }}</p><p><b>Tahun ajaran:</b> {{ $kelas->tahun_ajaran }}</p><p><b>Wali kelas:</b> {{ $kelas->wali_kelas ?? '-' }}</p>
<h3>Siswa di kelas ini</h3><ul>@forelse($siswas as $s)<li>{{ $s->nis }} — {{ $s->nama_lengkap }}</li>@empty<li>Belum ada siswa.</li>@endforelse</ul>
<a class="btn gray" href="{{ route('kelas.index') }}">Kembali</a></div>
@endsection
