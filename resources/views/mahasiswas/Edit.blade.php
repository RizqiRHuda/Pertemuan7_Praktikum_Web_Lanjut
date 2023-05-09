@extends('mahasiswas.layout')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Mahasiswa
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('mahasiswas.update', $Mahasiswa->nim) }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nim">Nim</label>
                        <input type="text" name="nim" class="form-control" id="nim" value="{{ $Mahasiswa->nim }}" aria-describedby="Nim">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="{{ $Mahasiswa->nama }}" aria-describedby="Nama">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" required="required" name="foto" value="{{$Mahasiswa->foto}}" placeholder="{{$Mahasiswa->foto}}"></br>
                        <img src="{{asset('storage/'.$Mahasiswa->foto)}}" alt="foto profile" style="height: 100px; width: 100px; overflow: hidden; object-fit: cover;">
                    </div>
                    <div class="form-group">
                    <label for="kelas">Kelas</label>
                        <select name="kelas"  class="form-control">
                            @foreach ($kelas as $Kelas)
                            <option value="{{$Kelas->id}}">{{$Kelas->nama_kelas}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="jurusan" name="jurusan" class="form-control" id="jurusan" value="{{ $Mahasiswa->jurusan }}" ariadescribedby="Jurusan">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No_Handphone</label>

                        <input type="no_hp" name="no_hp" class="form-control" id="no_hp" value="{{ $Mahasiswa->no_hp }}" ariadescribedby="No_Handphone">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="email">
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" value="{{ $Mahasiswa->tgl_lahir }}" ariadescribedby="Tanggal_Lahir">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection=