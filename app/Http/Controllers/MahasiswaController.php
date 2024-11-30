<?php



namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    // Menampilkan daftar mahasiswa
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    // Menampilkan form tambah mahasiswa
    public function create()
    {
        return view('mahasiswa.create');
    }

    // Menyimpan data mahasiswa baru
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas',
            'nama' => 'required',
            'alamat' => 'required',
            'tempat_tinggal' => 'required',
            'tanggal_lahir' => 'required|date',
            'no_telp' => 'required',
            'email' => 'required|email|unique:mahasiswas',
            'poto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload poto jika ada
        $poto = $request->file('poto') ? $request->file('poto')->store('potos') : null;

        Mahasiswa::create(array_merge($request->all(), ['poto' => $poto]));

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    // Menampilkan form edit mahasiswa
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    // Mengupdate data mahasiswa
    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $id,
            'nama' => 'required',
            'alamat' => 'required',
            'tempat_tinggal' => 'required',
            'tanggal_lahir' => 'required|date',
            'no_telp' => 'required',
            'email' => 'required|email|unique:mahasiswas,email,' . $id,
            'poto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload poto jika ada perubahan
        $poto = $mahasiswa->poto;
        if ($request->hasFile('poto')) {
            Storage::delete($mahasiswa->poto);
            $poto = $request->file('poto')->store('potos');
        }

        $mahasiswa->update(array_merge($request->all(), ['poto' => $poto]));

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil diupdate');
    }

    // Menghapus data mahasiswa
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        // Hapus poto jika ada
        if ($mahasiswa->poto) {
            Storage::delete($mahasiswa->poto);
        }

        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus');
    }

    // Opsional: Menampilkan detail mahasiswa (jika diperlukan)
    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.show', compact('mahasiswa'));
    }
}
