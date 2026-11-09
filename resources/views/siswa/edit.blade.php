@extends('layouts.app')
@section('title', 'Edit Siswa')
@section('content')
<div class="panel"><h1>{{ 'Edit Siswa' }}</h1>
@if($kelas->isEmpty())<div class="alert error">Belum ada kelas. Tambahkan kelas terlebih dahulu.</div><a class="btn" href="{{ route('kelas.create') }}">Tambah Kelas</a>@else
<form method="POST" action="{{ route('siswa.update', $siswa->id) }}">@csrf @if('PUT' === 'PUT') @method('PUT') @endif
<div class="grid">
<div><label>Kelas</label><select name="kelas_id" required><option value="">-- Pilih Kelas --</option>@foreach($kelas as $k)<option value="{{ $k->id }}" @selected(old('kelas_id', $siswa->kelas_id ?? '') == $k->id)>{{ $k->nama_kelas }} ({{ $k->kode_kelas }})</option>@endforeach</select></div>
<div><label>NIS</label><input name="nis" maxlength="20" required value="{{ old('nis', $siswa->nis ?? '') }}"></div>
<div><label>Nama Lengkap</label><input name="nama_lengkap" maxlength="100" required value="{{ old('nama_lengkap', $siswa->nama_lengkap ?? '') }}"></div>
<div><label>Jenis Kelamin</label><select name="jenis_kelamin" required><option value="">Pilih</option><option value="L" @selected(old('jenis_kelamin',$siswa->jenis_kelamin ?? '')=='L')>Laki-laki</option><option value="P" @selected(old('jenis_kelamin',$siswa->jenis_kelamin ?? '')=='P')>Perempuan</option></select></div>
<div><label>Tempat Lahir</label><input name="tempat_lahir" value="{{ old('tempat_lahir',$siswa->tempat_lahir ?? '') }}"></div>
<div><label>Tanggal Lahir</label><input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir',$siswa->tanggal_lahir ?? '') }}"></div>
<div><label>No. HP</label><input name="no_hp" value="{{ old('no_hp',$siswa->no_hp ?? '') }}"></div>
<div><label>Email</label><input type="email" name="email" value="{{ old('email',$siswa->email ?? '') }}"></div>
<div><label>Asal Sekolah</label><input name="asal_sekolah" required value="{{ old('asal_sekolah',$siswa->asal_sekolah ?? '') }}"></div>
<div><label>Jurusan</label><input name="jurusan" required value="{{ old('jurusan',$siswa->jurusan ?? '') }}"></div>
<div><label>Nama Ayah</label><input name="nama_ayah" value="{{ old('nama_ayah',$siswa->nama_ayah ?? '') }}"></div>
<div><label>Nama Ibu</label><input name="nama_ibu" value="{{ old('nama_ibu',$siswa->nama_ibu ?? '') }}"></div>
<div><label>No. HP Wali</label><input name="no_hp_wali" required value="{{ old('no_hp_wali',$siswa->no_hp_wali ?? '') }}"></div>
<div><label>Status</label><select name="status" required><option value="Aktif" @selected(old('status',$siswa->status ?? 'Aktif')=='Aktif')>Aktif</option><option value="Nonaktif" @selected(old('status',$siswa->status ?? '')=='Nonaktif')>Nonaktif</option></select></div>
</div>
<label>Alamat</label><textarea name="alamat" rows="3">{{ old('alamat',$siswa->alamat ?? '') }}</textarea>
<br><br><button class="btn">Simpan</button> <a class="btn gray" href="{{ route('siswa.index') }}">Kembali</a>
</form>@endif
</div>
@endsection
