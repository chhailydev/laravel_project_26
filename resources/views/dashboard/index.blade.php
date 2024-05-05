@extends("layouts.master")

@section("content")
    <div class="container">
        <h1>Dashboard</h1>
        <p>Welcome to the dashboard</p><!-- dashboard.blade.php -->

        <form action="{{ route("logout")}}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>

    </div>
@endsection