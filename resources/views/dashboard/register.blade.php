@extends("layouts.master")

@section("content")
<div class="content-body">
    <div class="row">
        <form action="{{ route("registerUser")}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("POST")
            <div class="container">
                <h1 class="title">REGISTER PAGE</h1>
                <div class="group-form mb-3">
                    <input type="file" name="profile" id="" class="form-control">
                </div>
                <div class="group-form mb-3">
                    <input type="text" class="form-control" name="username" required placeholder="Username">
                </div>
                <div class="group-form mb-3">
                    <input type="email" class="form-control" name="email" required placeholder="Email">
                </div>
                <div class="group-form mb-3">
                    <input type="password" class="form-control" name="password" required placeholder="Password">
                </div>
                <div class="group-form mb-3">
                    <select name="role" id="" class="form-control wide default-select">
                        @foreach ($role as $r )
                            <option value="{{ $r->id }}">{{ $r->role }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="group-form mb-3">
                    <button type="submit" class="btn btn-primary">REGISTER</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection