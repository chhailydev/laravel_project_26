@extends('layouts.master')

@section('content')
      <div class="content-body">
            <div class="container-fluid">
				<div class="row page-titles"> 
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">User account</a></li>
					</ol>
                </div>
                <!-- row -->

                <div class="row">
					<div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th style="width:50px;">
													<div class="form-check custom-checkbox checkbox-success check-lg me-3">
														<input type="checkbox" class="form-check-input" id="checkAll" required="">
														<label class="form-check-label" for="checkAll"></label>
													</div>
												</th>
                                                <th><strong>RULE</strong></th>
                                                <th><strong>NAME</strong></th>
                                                <th><strong>Email</strong></th>
                                                <th><strong>Date</strong></th>
                                                <th><strong>Status</strong></th>
                                                <th><strong></strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($accounts as $account)
                                            <tr>
                                                <td>
													<div class="form-check custom-checkbox checkbox-success check-lg me-3">
														<input type="checkbox" class="form-check-input" id="customCheckBox2" required="">
														<label class="form-check-label" for="customCheckBox2"></label>
													</div>
												</td>
                                                <td><strong>{{ $account->role_name }}</strong></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        @if ($account->profile)
                                                            <img src="{{ route('profile_image', ['id' => $account->id]) }}" alt="Profile Image" class="rounded-lg me-2" width="24">
                                                        @else
                                                            No Image
                                                        @endif
                                                        <span class="w-space-no">{{ $account->useranme }}</span>
                                                    </div>
                                                </td>
                                                <td>{{ $account->email }}</td>
                                                <td>{{ $account->created_at }}</td>
                                                <td><div class="d-flex align-items-center"><i class="fa fa-circle text-success me-1"></i> publish </div></td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>	
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection