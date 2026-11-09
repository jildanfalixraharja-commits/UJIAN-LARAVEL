@extends('layouts.app')
@section('title', 'Data Kelas')
@section('content')
<div class="panel">
    <h1>Data Kelas</h1>
    <a class="btn" href="{{ route('kelas.create') }}">+ Tambah Kelas</a>
    <table><thead><tr><th>No</th><th>Kode</th><th>Nama Kelas</th><th>Tingkat</th><th>Tahun Ajaran</th><th>Wali Kelas</th><th>Aksi</th></tr></thead><tbody>
    @forelse($kelas as $i => $item)
    <tr><td>{{ $i+1 }}</td><td>{{ $item->kode_kelas }}</td><td>{{ $item->nama_kelas }}</td><td>{{ $item->tingkat }}</td><td>{{ $item->tahun_ajaran }}</td><td>{{ $item->wali_kelas ?? '-' }}</td>
    <td><div class="actions"><a class="btn gray" href="{{ route('kelas.show',$item->id) }}">Detail</a><a class="btn green" href="{{ route('kelas.edit',$item->id) }}">Edit</a>
    <form method="POST" action="{{ route('kelas.destroy',$item->id) }}" onsubmit="return confirm('Yakin hapus kelas ini?')">@csrf @method('DELETE')<button class="btn red">Hapus</button></form></div></td></tr>
    @empty<tr><td colspan="7">Belum ada data kelas.</td></tr>@endforelse
    </tbody></table>
</div>
@endsection
