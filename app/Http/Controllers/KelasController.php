<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = DB::table('kelas')->orderBy('nama_kelas')->get();
        return view('kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('kelas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_kelas' => ['required', 'string', 'max:20', 'unique:kelas,kode_kelas'],
            'nama_kelas' => ['required', 'string', 'max:50'],
            'tingkat' => ['required', 'string', 'max:20'],
            'tahun_ajaran' => ['required', 'string', 'max:20'],
            'wali_kelas' => ['nullable', 'string', 'max:100'],
        ]);
        $data['created_at'] = now();
        $data['updated_at'] = now();
        DB::table('kelas')->insert($data);

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $kelas = DB::table('kelas')->where('id', $id)->first();
        abort_if(!$kelas, 404);
        $siswas = DB::table('siswas')->where('kelas_id', $id)->orderBy('nama_lengkap')->get();
        return view('kelas.show', compact('kelas', 'siswas'));
    }

    public function edit(string $id)
    {
        $kelas = DB::table('kelas')->where('id', $id)->first();
        abort_if(!$kelas, 404);
        return view('kelas.edit', compact('kelas'));
    }

    public function update(Request $request, string $id)
    {
        $kelas = DB::table('kelas')->where('id', $id)->first();
        abort_if(!$kelas, 404);
        $data = $request->validate([
            'kode_kelas' => ['required', 'string', 'max:20', Rule::unique('kelas', 'kode_kelas')->ignore($id)],
            'nama_kelas' => ['required', 'string', 'max:50'],
            'tingkat' => ['required', 'string', 'max:20'],
            'tahun_ajaran' => ['required', 'string', 'max:20'],
            'wali_kelas' => ['nullable', 'string', 'max:100'],
        ]);
        $data['updated_at'] = now();
        DB::table('kelas')->where('id', $id)->update($data);

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $dipakai = DB::table('siswas')->where('kelas_id', $id)->exists();
        if ($dipakai) {
            return redirect()->route('kelas.index')->with('error', 'Kelas tidak dapat dihapus karena masih memiliki siswa.');
        }
        DB::table('kelas')->where('id', $id)->delete();
        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus.');
    }
}
