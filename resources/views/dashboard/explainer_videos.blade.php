@extends('dashboard.layouts.app')

@section('content')
<div class="am-content">

    <div class="am-page-header">
        <div>
            <h2>فيديوهات التدريب</h2>
        </div>
    </div>

    <div class="row">
        @foreach($videos as $video)
            <div class="col-md-4 mb-4">
                <div class="am-card h-100">
                    <div class="am-card__body" style="padding:16px; text-align:center;">
                        <a href="{{url('uploads/explainer_videos/'.$video->video)}}" target="_blank">
                            <img src="{{ asset('assets/media/video_images/' . $video->video_image)}}"
                                 class="img-fluid"
                                 style="border-radius:6px; width:100%;">
                        </a>
                        {{-- <h5 style="text-align: center;margin-top: 10px;">{{$video->title}}</h5> --}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection
