<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->has('nama')) {
            $nama = request('nama');
            $mahasiswas = Mahasiswa::where('nama', 'LIKE', '%'.$nama.'%')->paginate(5);
            return view('mahasiswas.index', compact('mahasiswas'));
        } else {
            // $mahasiswas = Mahasiswa::all(); // Mengambil semua isi tabel
            // $mahasiswas = Mahasiswa::orderBy('nim', 'asc')->paginate(5);
            // return view('mahasiswas.index', compact('mahasiswas'))
            // ->with('i', (request()->input('page', 1) - 1) * 5);
            $user = Auth::user();
            $mahasiswas = Mahasiswa::paginate(5);
            return view('mahasiswas.index', compact('mahasiswas', 'user'));

        }
        //fungsi eloquent menampilkan data menggunakan pagination
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
        return view('mahasiswas.create', ['kelas' => $kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'tgl_lahir' => 'required'
        ]);

        //fungsi eloquent untuk menambah data
        $mahasiswas = new Mahasiswa;
        $mahasiswas->nim=$request->get('nim');
        $mahasiswas->nama=$request->get('nama');
        
        $mahasiswas->jurusan=$request->get('jurusan');
        $mahasiswas->no_hp=$request->get('no_hp');
        $mahasiswas->email=$request->get('email');
        $mahasiswas->tgl_lahir=$request->get('tgl_lahir');
     

        //fungsi eloquent untuk menambah data dengan relasi belongs to
        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');

        $mahasiswas->kelas()->associate($kelas);
        $mahasiswas->save();

        //
        //fungsi eloquent untuk menambah data
        // Mahasiswa::create($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswas.index')
        ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nim)
    {
        //
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        $Mahasiswa = Mahasiswa::find($nim);
        return view('mahasiswas.detail', compact('Mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        //
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        // $Mahasiswa = Mahasiswa::find($nim);
        // return view('mahasiswas.edit', compact('Mahasiswa'));

        $Mahasiswa = Mahasiswa::find($nim);
        $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
        return view('mahasiswas.edit', compact('Mahasiswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        //
        //melakukan validasi data
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'tgl_lahir' => 'required'
        ]);
            //fungsi eloquent untuk mengupdate data inputan kita
            // Mahasiswa::find($nim)->update($request->all());
            //jika data berhasil diupdate, akan kembali ke halaman utama
            $mahasiswas = Mahasiswa::with('kelas')->where('nim', $nim)->first();
            $mahasiswas->nim = $request->get('nim');
            $mahasiswas->nama = $request->get('nama');
            $mahasiswas->jurusan = $request->get('jurusan');
            $mahasiswas->no_hp = $request->get('no_hp');
            $mahasiswas->email = $request->get('email');
            $mahasiswas->tgl_lahir = $request->get('tgl_lahir');
            
            $kelas = new Kelas;
            $kelas->id = $request->get('kelas');
            //fungsi eloquent  untuk mengupadate data dengan relasi belongsTo
            $mahasiswas->Kelas()->associate($kelas);
            $mahasiswas->save();
            //Juka data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        //
        //fungsi eloquent untuk menghapus data
        Mahasiswa::find($nim)->delete();
        return redirect()->route('mahasiswas.index') -> with('success', 'Mahasiswa Berhasil Dihapus');
    }

    // public function search(Request $request)
    // {
    //     //
    //     //fungsi eloquent untuk mencari data
    //     $nama = $request->nama;
    //     $mahasiswas = Mahasiswa::where('nama', 'LIKE', '%'.$nama.'%')->paginate(5);
    //     return view('mahasiswas.index', compact('mahasiswas'));
    // }
}