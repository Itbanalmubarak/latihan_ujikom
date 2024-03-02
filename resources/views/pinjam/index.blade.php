@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-header">{{ __('Transaksi Pinjam') }}</div>
  
                <div class="card-body">
                    <a href="{{ route('pinjams.create') }}" class="btn btn-sm btn-secondary">
                        Tambah Pinjam
                    </a>
                    <table class="table" id="sample_data">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Anggota</th>
                                <th scope="col">Tanggal Pinjam</th>
                                <th scope="col">Tanggal Batas Kembali</th>
                                <th scope="col">Judul Buku</th>
                                <th scope="col">Jenis Media</th>
                                <th scope="col">Nama Pengguna</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            @foreach($pinjams as $row)
                            <?php $no++ ?>
                            <tr>
                                <th scope="row">{{ $no }}</th>
                                <td>{{$row->anggota->nm_anggota}}</td>
                                <td>{{$row->tg_pinjam}}</td>
                                <td>{{$row->tg_bts_kembali}}</td>
                                <td>{{$row->judul}}</td>
                                <td>{{$row->jns_media}}</td>
                                <td>{{$row->pengguna->nm_pengguna}}</td>
                                <td> 
                                    <a href="{{ route('pinjams.edit', $row->id) }}" class="btn btn-sm btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ route('pinjams.destroy',$row->id) }}" method="POST"
                                    style="display: inline" onsubmit="return confirm('Do you really want to delete {{ $row->name }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><span class="text-muted">
                                        Delete
                                    </span></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#sample_data').DataTable();
    });
</script>
@endsection