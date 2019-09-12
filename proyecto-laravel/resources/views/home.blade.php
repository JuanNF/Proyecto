@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.message')
            @foreach($images as $image)
                <div class="card pub_image">
                    @if($image->user->image)
                    <div class="card-header">                       
                        <div class="container_avatar">
                            <img src="{{route('user.avatar',['filename'=>$image->user->image])}}" class="avatar"/>
                        </div>
                        <div class="data-user">
                            {{$image->user->name.' '.$image->user->surname.' | '.$image->user->nick}}
                        </div>
                    </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
