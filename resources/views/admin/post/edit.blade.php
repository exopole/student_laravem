@extends('layouts.admin')

@section('content')
    <div class="container">
    <div class="row">
        <form class="col s12 m12" action="{{url('admin',['post', $post->id, ])}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{method_field('put')}}
            <div class="row">
                <div class="field input-field col s12 m6">
                    <input type="text" name="title" value="{{$post->title}}">
                    <label for="title">Titre:</label>
                    @if($errors->has('title'))
                        {{$errors->first('title')}}
                    @endif
                 </div>
            </div>
            <div class="row">
                 <div class="input-field col s12 m6">
                     <input type="text" name="slug" value="{{$post->slug}}">
                     <label for="slug">Slug:</label>
                 </div>
            </div>
            <div class="row">
                <div class="field input-field col s12">
                    <label for="content">Contenu</label>
                    <textarea name="content" id="content" class="materialize-textarea" >{{$post->content}}</textarea>
                    @if($errors->has('content'))
                        span {{$errors->first('content')}}
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="category_id" id="category_id" >
                        <option value="0">Non catégorisé</option>
                        @forelse($categories as $id=> $name)
                        <option {{check_select_edit($post->category, $id)}}  value="{{$id}}">{{$name}}</option>
                        @empty
                        @endforelse
                    </select>
                    <label for="category_id">Catégorie</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 input-margin">
                    <span class="title">Mots clés</span>
                    <p>
                    @foreach($tags as $id => $name)
                        <input name="tags[]" class="filled-in" id="tag{{$id}}" value="{{$id}}" {{$post->hasTag($id)? 'checked' : ''}} type="checkbox" >
                        <label for="tag{{$id}}">{{$name}}</label>
                    @endforeach
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="user_id" id="user_id" >
                        <option value="0">Anonymous</option>
                        @forelse($users as $id=> $name)
                            <option {{check_select_edit($post->user, $id)}}  value="{{$id}}">{{$name}}</option>
                        @empty
                        @endforelse
                    </select>
                    <label for="user_id">Auteur</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input class="datepicker" type="date" name="publish_at" id="publish_at" value="{{$post->publish_at}}">
                    <label for="published_at">Date de publication</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 input-margin">
                    <input {{check_radio_edit('published', $post->status)}} type="radio" name="status" value="published" id="published" >
                    <label for="published">Publié {{$post->status}}</label>
                    <input {{check_radio_edit('unpublished', $post->status)}} type="radio" name="status" value="unpublished" id="unpublished" >
                    <label for="unpublished">Dépublié</label>
                    <input {{check_radio_edit('draft', $post->status)}} type="radio" name="status" id="draft" value="draft" >
                    <label for="draft">Brouillon</label>
                </div>
            </div>
            @if(!empty($post->thumbnail))
            <div class="row">
                <div class="col S6">
                    <img class="responsive-img" src="{{url('images', [$post->thumbnail])}}" alt="">
                </div>    
                <div class="input-field col s3 input-margin">
                    <input type="checkbox" class="filled-in" id="delete_image" value="delete" name="delete_image" />
                    <label for="delete_image">Effacer l'image</label>
                </div>
            </div>
            @endif
            <div class="file-field input-field">
                <div class="btn">
                    <span>Image</span>
                    <input type="file" name="thumbnail">
                    @if($errors->has('thumbnail'))
                        <span>{{$errors->first('thumbnail')}}</span>
                    @endif
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>            
            <div class="row">
                <div class="input-field col s12">
                    <p><input class="btn waves-effect waves-light" type="submit" ></p>
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection

@section('script')
<script>
    $('select').material_select();
    $('.datepicker').pickadate({
        format: 'yyyy-m-d'
    });
</script>

@endsection