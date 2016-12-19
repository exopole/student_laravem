@extends('layouts.master')

@section('content')
@if(count($post)>0)
<h2>{{$post->title}}</h2>
@if(!empty($post->thumbnail))
    <img src="{{url('images', [$post->thumbnail])}}" alt="">
@endif
<p class="post__meta">{{($post->category)? $post->category->title : 'non catégorisé'}}
    @if(!is_null($post->user))
        auteur: <a class="post__meta-user" href="{{url('user', [$post->user->id])}}">{{$post->user->name}}</a>
    @endif
</p>
<ul>
    @forelse($post->tags as $tag)
        <li><a href="{{url('tag', $tag->id)}}">{{$tag->name}}</a></li>
    @empty
        <li>pas de mot clé</li>
    @endforelse
</ul>
@else
    <p>désolé aucun article</p>
@endif
@endsection

@section('sidebar')
    @parent
    @if(!empty($students))
        <ul>
            @foreach($students as $student)
                <li>
                    <a href="{{url('student', [$student->id])}}">{{$student->name}}</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>désolé aucun étudiant</p>
    @endif
@endsection