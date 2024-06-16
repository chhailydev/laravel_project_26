@extends('layouts.master')

@section('content')
<div class="content-body">
    <h4>Add Major</h4>
    <form action="/create/major" method="POST">
        @csrf
        <div class="group-form mb-3">
            <input type="text" name="major" class="form-control" placeholder="add major">
        </div>
        <div class="group-form mb-3">
            <button type="submit btn btn-sm btn-priamry">ADD MAJOR</button>
        </div>
    </form>
</div>
@endsection