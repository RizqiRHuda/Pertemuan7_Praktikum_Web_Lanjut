<html>

<head>
    <title>Kartu Hasil Studi - {{$Mahasiswa->nama}} - {{$Mahasiswa->nim}}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="container mt-2 text-center">
            <h3 class="mb-4">Jurusan Teknologi Informasi - Politeknik Negeri Malang</h3>
            <h4 class="mb-4">KARTU HASIL STUDI (KHS)</h4>
            <ul class="list-group list-group-flush text-left mb-4">
                <li class="list-group-item"><b>Nim: </b>{{$Mahasiswa->nim}}</li>
                <li class="list-group-item"><b>Nama: </b>{{$Mahasiswa->nama}}</li>
                <li class="list-group-item"><b>Kelas: </b>{{$Mahasiswa->kelas->nama_kelas}}</li>
            </ul>
            
            <div class="row justify-content-center align-items-center">
                <div class="card" style="width: 35.5rem;">
                    <div class="card-header bg-success text-white">
                        Nilai Mahasiswa
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Mata_Kuliah</th>
                                <th>SKS</th>
                                <th>Semester</th>
                                <th>Nilai</th>
                            </tr>
                            @foreach ($Mahasiswa->mataKuliah as $matkul)
                            <tr>
                                <td>{{ $matkul->nama_matkul }}</td>
                                <td>{{ $matkul->sks }}</td>
                                <td>{{ $matkul->semester }}</td>
                                <td>{{ $matkul->pivot->nilai }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>