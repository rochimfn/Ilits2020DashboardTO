@extends('authtemplate')
@section('judul','Lupa Password')

@section('konten')
<!-- Header -->
<div class="header py-7 py-lg-6">
    <div class="container">
        <div class="header-body text-center mb-7">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <h1 class="text-black" style="font-weight: bold">Lupa Password</h1>
                    <p class="text-lead text-black">Masukkan email anda di field yang disediakan.</p>
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
                    <form action="/proses_request_lupa_password" method="POST">
                            {{csrf_field()}}
                        <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input class="form-control" name="email" placeholder="Email" type="email" required>
                            </div>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Request</button>
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