@extends('layouts.userapp')

@section('content')

        <div class="justify-content-center">
            {{-- @include('user.sidebar') --}}
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
                    <div class="card-header"> Upload Files</div>
                    <div class="card-body" style="padding-top: 30px; padding-bottom: 30px;">
                        <h1 class="display-4">File Upload</h1>
                        <form action="{{ url('user/file/store' )}}" enctype="multipart/form-data" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="InputTemplate">Select File</label>
                                <input type="file" id="InputTemplate" class="form-control" name="template">
                            </div>
                            <hr class="my-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="business" name="template_type" id="template_type">
                                <label class="form-check-label" for="defaultCheck1">Business Template</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="milestone" name="template_type" id="template_type">
                                <label class="form-check-label" for="defaultCheck2">Milestone Template</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="pilot-project" name="template_type" id="template_type">
                                <label class="form-check-label" for="defaultCheck2">Pilot Project Template</label>
                            </div>
                            {{-- <input type="hidden" value="template" name="template_type"> --}}
                        <input type="hidden" name="company" id="company" value="{{Auth::user()->company}}">
                            
                            <hr class="my-4">
                            <button type="submit" class="btn btn-primary btn-lg active">Upload</button>
                        </form>
                    </div>
                    </div>
                </div>
                

        </div>


@endsection
