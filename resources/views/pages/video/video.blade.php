@extends('layout')
@section('content')
<div class="container">
    @foreach($all_video as $key => $video)
    <h3>{{$video->video_title}}</h3>
    <p>{{$video->video_desc}}</p>
    <div class="embed-responsive embed-responsive-16by9">
        {{-- <td contenteditable data-video_id="'.$video->video_id.'" data-video_type="video_link" class="video_edit" id="video_link_'.$video->video_id.'">https://youtu.be/{{$video->video_link}}</td> --}}
        <td><iframe width="200" height="200" src="https://www.youtube.com/embed/{{$video->video_link}}" <iframe width="560" height="315" src="https://www.youtube.com/embed/5EsRDzCFGqc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
        {{-- <td><iframe width="200" height="200" src="https://youtube/'.$video->video_link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td> --}}
    </div>
    <br>
    {{-- <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/137857207" allowfullscreen></iframe>
    </div> --}}
    @endforeach
</div>


@endsection
