@extends("layouts.master")

@section('content')
<div class="container-float">
    <div class="row">
        <div class="col-xl-6">
            <video autoplay loop muted>
                <source src="{{ asset("assets/Business chart.mp4")}}" type="video/mp4">
            </video>
        </div>
        <div class="col-xl-6">
            <form action="{{ route("login.send")}}" method="POST">
                @csrf
                @method("POST")
                <div class="container">
                    <h1 class="login-title">Welcome back</h1>
                    <h2 class="login-sub-title">Login Page</h2>
                    <div class="group-form mb-3">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="text" class="form-control p-3 ps-5" id="input-form" placeholder="Email" name="email">
                    </div>
                    <div class="group-form mb-3">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" class="form-control p-3 ps-5" id="input-form" placeholder="Password" name="password">
                    </div>
                    <div class="group-form mb-3">
                        <button type="submit" class="btn btn-primary p-2 fw-bold" style="width: 200px">LOGIN</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection