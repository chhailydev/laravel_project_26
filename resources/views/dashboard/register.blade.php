@extends("layouts.master")

@section("content")
<div class="container">
    <div class="row">
        <form action="{{ route("registerUser")}}" method="POST">
            @csrf
            @method("POST")
            <div class="container">
                <h1 class="title">REGISTER PAGE</h1>
                <div class="group-form mb-3">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>
                <div class="group-form mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="group-form mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="group-form mb-3">
                    <button type="submit" class="btn btn-primary">REGISTER</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection