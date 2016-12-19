@extends('layouts.master')

@section('content')
@if(count($posts)>0)
    @foreach($posts as $post)
        <div class="row post">
            <div class="col m6">
                <h2><a href="{{url('article', [$post->id, $post->slug])}}">{{$post->title}}</a></h2>
                <p class="post__meta">{{($post->category)? $post->category->title : 'non catégorisé'}}
                    @if(!is_null($post->user))
                        auteur: <a class="post__meta-user" href="{{url('user', [$post->user->id])}}">{{$post->user->name}}</a>
                    @endif
                </p>
            </div>
            <div class="col m6">
                @if(!is_null($post->thumbnail))
                    <img class="responsive-img" src="{{url('images', [$post->thumbnail])}}" alt="">
                @endif
            </div>
        </div>
        @include('partials.meta')
        <div class="divider"></div>
    @endforeach
@else
    <p>désolé aucun article</p>
@endif
@endsection

@section('sidebar')
@parent
@if(count($students)>0)
        @foreach($students as $student)
            <div class="row">
                <div class="col m12">
                <h2><a href="{{url('student', [$student->id])}}">{{$student->name}}</a></h2>
                @if(count($student->avatar)>0)
                    <img class="responsive-img" src="{{url('avatars', [$student->avatar->uri])}}" alt="">
                @endif
                </div>
            </div>
        @endforeach
@else
    <p>désolé aucun étudiant</p>
@endif
@endsection