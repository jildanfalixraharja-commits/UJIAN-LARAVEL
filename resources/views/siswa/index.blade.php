@extends('layouts.app')
@section('title','Data Siswa')
@section('content')
<div class="panel"><h1>Data Siswa</h1><a class="btn" href="{{ route('siswa.create') }}">+ Tambah Siswa</a>
<table><thead><tr><th>No</th><th>NIS</th><th>Nama Lengkap</th><th>Jenis Kelamin</th><th>Kelas</th><th>Jurusan</th><th>Status</th><th>Aksi</th></tr></thead><tbody>
@forelse($siswas as $i => $s)
<tr><td>{{ $i+1 }}</td><td>{{ $s->nis }}</td><td>{{ $s->nama_lengkap }}</td><td>{{ $s->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td><td>{{ $s->nama_kelas }}</td><td>{{ $s->jurusan }}</td><td>{{ $s->status }}</td>
<td><div class="actions"><a class="btn gray" href="{{ route('siswa.show',$s->id) }}">Detail</a><a class="btn green" href="{{ route('siswa.edit',$s->id) }}">Edit</a><form method="POST" action="{{ route('siswa.destroy',$s->id) }}" onsubmit="return confirm('Yakin hapus siswa ini?')">@csrf @method('DELETE')<button class="btn red">Hapus</button></form></div></td></tr>
@empty<tr><td colspan="8">Belum ada data siswa.</td></tr>@endforelse
</tbody></table></div>
@endsection
