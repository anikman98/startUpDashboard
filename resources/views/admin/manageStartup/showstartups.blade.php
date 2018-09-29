@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- @include('admin.sidebar') --}}
        <div class="col-md-12">
        	@if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $message }}</strong>
                </div>
                @endif
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $message }}</strong>
                </div>
                @endif
            <div class="card">
            <div class="card-header"><strong>Startup's</strong></div>
                <div class="card-body" >
                    @if($companies->count() === 0)
                        <div>
                            <h4>No Company have been created !</h4>
                        </div>
                    @else
                        <table class="table table-bordered table-sm table-hover">
                            @foreach($companies as $company)
                                <tr>
                                    <th style="font-size:18px;" scope="col" > <b>{{ $company->name }}</b></th>
                                    <td><a href="{{ url('/admin/startups/'.$company->name) }}" title="View ProjectManagement"><button style="background-color:#3367D6" class="btn btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a></td>
                                    <td><p>Chart based on project.(completed.pending, on-schedule.yet to be decided).</p></td>
                                </tr>                                    
                            @endforeach  
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
