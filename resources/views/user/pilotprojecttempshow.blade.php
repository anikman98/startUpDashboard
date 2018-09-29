@extends('layouts.userapp')

@section('content')
    <div class="justify-content-center">
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
            <div class="card-header"> PilotProject Files</div>
            <div class="card-body" style="padding-top: 30px; padding-bottom: 30px;">
                <table class="table">
                    <tr>
                        <th scope="col">File name</th>
                        <th scope="col">Uploaded At</th>
                        <th scope="col">Deadline</th>
                        <th scope="col"></th>
                    </tr>
                    @foreach($files as $file)
                        @if(Auth::user()->company === $file->company)
                            @if($file->template_type === 'pilot-project')
                            <tr>
                                <td>{{ $file->name }}</td>
                                <td>{{ $file->updated_at }}</td>
                                <td>{{ $file->deadline }}</td>
                                        <!--  @define $path = '/public/admin/'.$file->name -->
                                <td><a href="/download/{{ $file->name }}" target="_blank"><button class="btn btn-primary btn-sm">Open File</button></a></td>
                            </tr>                                  
                            @endif    
                        @endif 
                    @endforeach                
                </table>
            </div>
        </div>
    </div>
@endsection
