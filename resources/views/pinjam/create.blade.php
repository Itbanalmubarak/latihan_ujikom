@extends('layout')
  
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-10">
              <div class="card">
                  <div class="card-header">Add Transaksi Pinjam</div>
                  <div class="card-body">
  
                      <form action="{{ route('pinjams.store') }}" method="POST">
                          @csrf

                          <div class="form-group row mt-3">
                              <label for="no_transaksi_pinjam" class="col-md-4 col-form-label text-right">No Transaksi Pinjam</label>
                              <div class="col-md-6">
                                  <input type="text" id="no_transaksi_pinjam" class="form-control" name="no_transaksi_pinjam" required autofocus>
                                  @if ($errors->has('no_transaksi_pinjam'))
                                      <span class="text-danger">{{ $errors->first('no_transaksi_pinjam') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row mt-3">
                            <label for="kd_anggota" class="col-md-4 col-form-label text-right">Nama Anggota</label>
                            <div class="col-md-6">
                                <select class="form-select" id="kd_anggota" name="kd_anggota" aria-label="kd_anggota" autofocus>
                                    <option value="">Choose</option>
                                    @foreach($anggotas as $item)
                                    <option value="{{ $item->kd_anggota}}">{{ $item->nm_anggota}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('kd_anggota'))
                                    <span class="text-danger">{{ $errors->first('kd_anggota') }}</span>
                                @endif
                            </div>
                          </div>

                          <div class="form-group row mt-3">
                            <label for="kd_koleksi" class="col-md-4 col-form-label text-right">Kode Koleksi</label>
                            <div class="col-md-6">
                                <select class="form-select" id="kd_koleksi" name="kd_koleksi" aria-label="kd_koleksi" onchange="selectKoleksi(this.value)">
                                    <option value="">Choose</option>
                                    @foreach($koleksis as $item)
                                    <option value="{{ $item->kd_koleksi}}">{{ $item->kd_koleksi}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('kd_koleksi'))
                                    <span class="text-danger">{{ $errors->first('kd_koleksi') }}</span>
                                @endif
                            </div>
                          </div>

                          <div class="form-group row mt-3">
                              <label for="tg_pinjam" class="col-md-4 col-form-label text-right">Tanggal Pinjam</label>
                              <div class="col-md-6">
                                  <input type="date" id="tg_pinjam" class="form-control" name="tg_pinjam" required >
                                  @if ($errors->has('tg_pinjam'))
                                      <span class="text-danger">{{ $errors->first('tg_pinjam') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row mt-3">
                              <label for="tg_bts_kembali" class="col-md-4 col-form-label text-right">Tanggal Kembali</label>
                              <div class="col-md-6">
                                  <input type="date" id="tg_bts_kembali" class="form-control" name="tg_bts_kembali" required >
                                  @if ($errors->has('tg_bts_kembali'))
                                      <span class="text-danger">{{ $errors->first('tg_bts_kembali') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row mt-3">
                              <label for="judul" class="col-md-4 col-form-label text-right">Judul</label>
                              <div class="col-md-6">
                                  <input type="text" id="judul" class="form-control" name="judul" required autofocus>
                                  @if ($errors->has('judul'))
                                      <span class="text-danger">{{ $errors->first('judul') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row mt-3">
                              <label for="jns_bhn_pustaka" class="col-md-4 col-form-label text-right">Jenis Bahan Pustaka</label>
                              <div class="col-md-6">
                                  <input type="text" id="jns_bhn_pustaka" class="form-control" name="jns_bhn_pustaka" required autofocus>
                                  @if ($errors->has('jns_bhn_pustaka'))
                                      <span class="text-danger">{{ $errors->first('jns_bhn_pustaka') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row mt-3">
                            <label for="jns_koleksi" class="col-md-4 col-form-label text-right">Jenis Koleksi</label>
                            <div class="col-md-6">
                                <select class="form-select" id="jns_koleksi" name="jns_koleksi" aria-label="jns_koleksi">
                                    <option value="">Choose</option>
                                    <option value="buku">Buku</option>
                                    <option value="novel">Penelitian</option>
                                    <option value="penelitian">Penelitian</option>
                                    <option value="artikel">Artikel</option>
                                </select>
                                @if ($errors->has('jns_koleksi'))
                                    <span class="text-danger">{{ $errors->first('jns_koleksi') }}</span>
                                @endif
                            </div>
                          </div>

                          <div class="form-group row mt-3">
                            <label for="jns_media" class="col-md-4 col-form-label text-right">Jenis Media</label>
                            <div class="col-md-6">
                                <select class="form-select" id="jns_media" name="jns_media" aria-label="jns_media">
                                    <option value="">Choose</option>
                                    <option value="online">Online</option>
                                    <option value="offline">Offline</option>
                                </select>
                                @if ($errors->has('jns_media'))
                                    <span class="text-danger">{{ $errors->first('jns_media') }}</span>
                                @endif
                            </div>
                          </div>
  
                          <div class="col-md-6 offset-md-4 mt-3 p-2 d-grid">
                              <button type="submit" class="btn btn-primary">
                                  Save
                              </button>
                          </div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
<script>

    function selectKoleksi(id) {

        $.ajax({
            type: "GET",
            headers: {
                "Content-Type":"application/json"
            },
            url:"{{ url('pinjams')}}/"+id,
            success: function(response) {
                $('#id').val(response.id);
                $('#judul').val(response.judul);
                $('#jns_bhn_pustaka').val(response.jns_bhn_pustaka);
                $('#jns_koleksi').val(response.jns_koleksi);
                $('#jns_media').val(response.jns_media);
            },
            error: function(err) {
                console.log(err);
            }
        });
    }

    
</script>
@endsection