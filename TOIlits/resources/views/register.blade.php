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
                                    <span class="input-group-text"><i class="fas fa-users"></i></span>
                                </div>
                                  <select class="form-control" name="forda" id="forda">
                                    @foreach($forda as $data)
                                        <option value="{{ $data->id }}">{{$data->nama}}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <small id="location" class="form-text text-muted">Lokasi : </small>
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
                $('#forda').change(function(){
                    GetLocation($('#forda').val());
                })
                $('#form').validate({ // initialize the plugin
                    rules: {
                        no_wa: {
                            required: true,
                            digits: true                        
                        }
                    }
                });
                GetLocation($('#forda').val());
            });

            function GetLocation(id){
                $.ajax({
                    url:'{{ url('')}}/get_location/'+id,
                    method:'GET',
                    success:function(data){
                        var json = JSON.parse(data);
                        $('#location').html('Lokasi : '+json.daerah);
                    }
                })
            }
    </script>
@endsection