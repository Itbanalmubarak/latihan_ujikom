<!DOCTYPE html>
<html>
<head>
    <title>Laporan PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>Laporan Perpustakaan</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</p>
  
    <table class="table" >
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NO TRX KEMBALI</th>
                <th scope="col">NO TRX PINJAM</th>
                <th scope="col">Nama Anggota</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Denda</th>
                <th scope="col">Nama Pengguna</th>
            </tr>
        </thead>
        <tbody>
        @if($data)
        <?php $no = 0; ?>
            @foreach($data as $row)
            <?php $no++ ?>
            <tr>
                <th scope="row">{{ $no }}</th>
                <td>{{ $row['no_transaksi_kembali'] }}</td>
                <td>{{ $row['no_transaksi_pinjam'] }}</td>
                <td>{{ $row['anggota']['nm_anggota'] }}</td>
                <td>{{ $row['tg_pinjam'] }}</td>
                <td>{{ $row['tg_kembali'] }}</td>
                <td>{{ $row['judul'] }}</td>
                <td>{{ $row['denda'] }}</td>
                <td>{{ $row['pengguna']['nm_pengguna'] }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9">No Data</th>
            </tr>
        @endif
        </tbody>
    </table>
    </div>
  
</body>
</html>