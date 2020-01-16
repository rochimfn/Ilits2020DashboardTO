@extends('authtemplate')
@section('judul','Pendaftaran')
    
@section('konten')
<!-- Header -->
<div class="header py-7 py-lg-6">
    <div class="container">
        <div class="header-body text-center mb-7">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <h1 class="text-black" style="font-weight: bold">Pendaftaran!</h1>
                    <p class="text-lead text-black">Silahkan daftar di sini untuk mengikuti Try Out ILITS! 2020.</p>
                </div>
            </div>
        </div>
    </div>
    
</div>
<!-- Page content -->
<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
            <div class="card bg-secondary shadow border-0">
                <div class="card-body px-lg-5 py-lg-5">
                    @if($message=Session::get('pesan'))
                    <div class="alert alert-{{ Session::get('tipe') }}" role="alert">
                        {{ $message }}
                    </div>
                    @endif
                    <form action="/proses_register" method="POST" id="form">
                            {{csrf_field()}}
                        <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-users"></i></span>
                                </div>
                                <input class="form-control" name="nama" placeholder="Nama" type="text" required>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input class="form-control" name="email" placeholder="Email" type="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input class="form-control" name="password" placeholder="Password" type="password" required pattern=".{6,12}">
                                
                            </div><small>Password terdiri dari 6-12 karakter</small>
                        </div>

                        <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-school"></i></span>
                                </div>
                                <input class="form-control" name="asal_sekolah" placeholder="Asal Sekolah" type="text" required>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
                                </div>
                                <input class="form-control" name="no_wa" placeholder="No. WA" type="text" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-building"></i></span>
                                </div>
                                  <select class="form-control" name="forda" id="forda">
                                    @foreach($forda as $data)
                                        <option value="{{ $data->id }}">{{$data->daerah}}</option>
                                    @endforeach
                                  </select>
                                </div>
                        </div>
                        <label>Pilihan Try Out</label>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="pilihan_tryout" value="1" checked>
                            Saintek
                          </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pilihan_tryout" value="2">
                                Soshum
                          </label>
                        </div>
                        <br>
                        <div class="form-group">
                          <label>Minat Departemen</label>
                          <select class="form-control" name="departemen">
                            <option style="font-size:16px;font-weight:bold" disabled>FAKULTAS SAINS DAN ANALITIKA DATA</option>
                            <option value="1">Fisika</option>
                            <option value="2">Matematika</option>
                            <option value="3">Statistika</option>
                            <option value="4">Kimia</option>
                            <option value="5">Biologi</option>
                            <option value="6">Akutaria</option>
                            <option style="font-size:16px;font-weight:bold" disabled>FAKULTAS TEKNOLOGI INDUSTRI DAN REKAYASA SISTEM</option>
                            <option value="7">Teknik Mesin</option>
                            <option value="8">Teknik Kimia</option>
                            <option value="9">Teknik Fisika</option>
                            <option value="10">Teknik Industri</option>
                            <option value="11">Teknik Material dan Metalurgi</option>
                            <option style="font-size:16px;font-weight:bold" disabled>FAKULTAS TEKNIK SIPIL, PERENCANAAN, DAN KEBUMIAN</option>
                            <option value="12">Teknik Sipil</option>
                            <option value="13">Arsitektur</option>
                            <option value="14">Teknik Lingkungan</option>
                            <option value="15">Perencanaan Wilayah Kota</option>
                            <option value="16">Teknik Geomatika</option>
                            <option value="17">Teknik Geofisika</option>
                            <option style="font-size:16px;font-weight:bold" disabled>FAKULTAS TEKNOLOGI KELAUTAN</option>
                            <option value="18">Teknik Perkapalan</option>
                            <option value="19">Teknik Sistem Perkapalan</option>
                            <option value="20">Teknik Kelautan</option>
                            <option value="21">Teknik Transportasi Laut</option>
                            <option style="font-size:16px;font-weight:bold" disabled>FAKULTAS TEKNOLOGI ELEKTRO DAN INFORMATIKA CERDAS</option>
                            <option value="22">Teknik Elektro</option>
                            <option value="23">Teknik Biomedik</option>
                            <option value="24">Teknik Komputer</option>
                            <option value="25">Teknik Informatika</option>
                            <option value="26">Sistem informasi</option>
                            <option value="27">Teknologi Informasi</option>
                            <option style="font-size:16px;font-weight:bold" disabled>FAKULTAS DESAIN KREATIF DAN BISNIS DIGITAL</option>
                            <option value="28">Desain Produk</option>
                            <option value="29">Desain Interior</option>
                            <option value="30">Desain Komunikasi Visual</option>
                            <option value="31">Manajemen Bisnis</option>
                            <option value="32">Studi Pembangunan</option>
                            <option style="font-size:16px;font-weight:bold" disabled>FAKULTAS VOKASI</option>
                            <option value="33">Teknik Infrastruktur Sipil</option>
                            <option value="34">Teknik Mesin Industri</option>
                            <option value="35">Teknik Elekro Otomasi</option>
                            <option value="36">Teknik Kimia Industri</option>
                            <option value="37">Teknik Instrumentasi</option>
                            <option value="38">Statistika Bisnis</option>
                          </select>
                        </div>
                        <small>Untuk informasi tentang departemen, silahkan cek di website <a href="http://inilho.its.ac.id" target="_blank">Ini Lho ITS!</a></small>
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Sign up</button>
                        </div>
                    </form>
                    <!-- <img src="images/logotulisantrans.png" class="img img-fluid" /> -->
                    <div class="row">
                        <div class="col-md-12">
                    <p class="m-4">Sudah punya akun? <a href="/">Masuk di sini</a></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <script>
            $(document).ready(function () {
        
                $('#form').validate({ // initialize the plugin
                    rules: {
                        no_wa: {
                            required: true,
                            digits: true                        
                        }
                    }
                });
              
            });

           
    </script>
@endsection
