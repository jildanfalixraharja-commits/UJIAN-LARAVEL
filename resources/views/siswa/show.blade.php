@extends('layouts.app')
@section('title','Detail Siswa')
@section('content')
<div class="panel"><h1>Detail Siswa</h1>
<div class="grid">
<div><p><b>NIS</b><br>{{ $siswa->nis }}</p><p><b>Nama lengkap</b><br>{{ $siswa->nama_lengkap }}</p><p><b>Jenis kelamin</b><br>{{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p><p><b>Kelas</b><br>{{ $siswa->nama_kelas }} ({{ $siswa->kode_kelas }})</p><p><b>Jurusan</b><br>{{ $siswa->jurusan }}</p><p><b>Status</b><br>{{ $siswa->status }}</p></div>
<div><p><b>Tempat, tanggal lahir</b><br>{{ $siswa->tempat_lahir ?? '-' }}, {{ $siswa->tanggal_lahir ?? '-' }}</p><p><b>Alamat</b><br>{{ $siswa->alamat ?? '-' }}</p><p><b>No. HP</b><br>{{ $siswa->no_hp ?? '-' }}</p><p><b>Email</b><br>{{ $siswa->email ?? '-' }}</p><p><b>Asal sekolah</b><br>{{ $siswa->asal_sekolah }}</p><p><b>Nama ayah / ibu</b><br>{{ $siswa->nama_ayah ?? '-' }} / {{ $siswa->nama_ibu ?? '-' }}</p><p><b>No. HP wali</b><br>{{ $siswa->no_hp_wali }}</p></div>
</div><a class="btn gray" href="{{ route('siswa.index') }}">Kembali</a> <a class="btn green" href="{{ route('siswa.edit',$siswa->id) }}">Edit</a>
</div>
@endsection
