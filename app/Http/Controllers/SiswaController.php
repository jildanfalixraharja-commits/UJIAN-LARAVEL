<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class SiswaController extends Controller
{
    private function rules(bool $creating, ?string $id = null): array
    {
        return [
            'kelas_id' => ['required', 'integer', 'exists:kelas,id'],
            'nis' => ['required', 'string', 'max:20', Rule::unique('siswas', 'nis')->ignore($id)],
            'nama_lengkap' => ['required', 'string', 'max:100'],
            'jenis_kelamin' => ['required', Rule::in(['L', 'P'])],
            'tempat_lahir' => ['nullable', 'string', 'max:100'],
            'tanggal_lahir' => ['nullable', 'date'],
            'alamat' => ['nullable', 'string'],
            'no_hp' => ['nullable', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:255'],
            'asal_sekolah' => ['required', 'string', 'max:150'],
            'jurusan' => ['required', 'string', 'max:100'],
            'nama_ayah' => ['nullable', 'string', 'max:100'],
            'nama_ibu' => ['nullable', 'string', 'max:100'],
            'no_hp_wali' => ['required', 'string', 'max:20'],
            'status' => ['required', Rule::in(['Aktif', 'Nonaktif'])],
        ];
    }

    public function index()
    {
        $siswas = DB::table('siswas')
            ->join('kelas', 'siswas.kelas_id', '=', 'kelas.id')
            ->select('siswas.*', 'kelas.nama_kelas')
            ->orderBy('siswas.nama_lengkap')
            ->get();

        return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        $kelas = DB::table('kelas')->orderBy('nama_kelas')->get();
        return view('siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules(true));
        $data['created_at'] = now();
        $data['updated_at'] = now();
        DB::table('siswas')->insert($data);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $siswa = DB::table('siswas')
            ->join('kelas', 'siswas.kelas_id', '=', 'kelas.id')
            ->select('siswas.*', 'kelas.nama_kelas', 'kelas.kode_kelas')
            ->where('siswas.id', $id)->first();
        abort_if(!$siswa, 404);
        return view('siswa.show', compact('siswa'));
    }

    public function edit(string $id)
    {
        $siswa = DB::table('siswas')->where('id', $id)->first();
        abort_if(!$siswa, 404);
        $kelas = DB::table('kelas')->orderBy('nama_kelas')->get();
        return view('siswa.edit', compact('siswa', 'kelas'));
    }

    public function update(Request $request, string $id)
    {
        abort_unless(DB::table('siswas')->where('id', $id)->exists(), 404);
        $data = $request->validate($this->rules(false, $id));
        $data['updated_at'] = now();
        DB::table('siswas')->where('id', $id)->update($data);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        DB::table('siswas')->where('id', $id)->delete();
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
