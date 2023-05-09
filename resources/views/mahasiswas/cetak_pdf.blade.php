<!DOCTYPE html>

<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-2 text-center">
        <h3 class="mb-4">Jurusan Teknologi Informasi - Politeknik Negeri Malang</h3>
        <h4 class="mb-4">KARTU HASIL STUDI (KHS)</h4><br>
        <ul class="list-group list-group-flush text-left mb-4">
            <li class="list-group-item"><b>Nim: </b>{{$Mahasiswa->nim}}</li>
            <li class="list-group-item"><b>Nama: </b>{{$Mahasiswa->nama}}</li>
            <li class="list-group-item"><b>Kelas: </b>{{$Mahasiswa->kelas->nama_kelas}}</li>
        </ul>
        <br>
        <table class="table">
            <thead class="alert alert-success" role="alert">
                <tr>
                    <th scope="col">Mata Kuliah</th>
                    <th scope="col">SKS</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Nilai</th>
                </tr>
            </thead>
            <tbody>
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
</body>

</html>