@extends('layouts.master')

@section('content')
    <div class="content-body">
        <form method="POST" action="/create/role">
            <h4>CREATE ROLE</h4>
            @csrf
            @method("POST")
            <div class="form-group">
                <label for="">Role Name</label>
                <input type="text" name="role" class="form-control role">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create Role</button>
            </div>
        </form>
    </div>
@endsection