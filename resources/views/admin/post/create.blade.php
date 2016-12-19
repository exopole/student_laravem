@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <form class="col s12 m12" action="{{url('admin', 'post')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
	                <div class="field input-field col s12 m6">
	                    <input type="text" name="title" value="{{old('title')}}">
	                    <label for="title">Titre:</label>
	                    @if($errors->has('title'))
	                        {{$errors->first('title')}}
	                    @endif
	                </div>
	            </div>
                <div class="row">
	                <div class="input-field col s12 m6">
	                    <input type="text" name="slug" value="{{old('slug')}}">
	                    <label for="slug">Slug:</label>
	                </div>
	             </div>
	             <div class="row">
	                <div class="field input-field col s12">
	                    <label for="content">Contenu</label>
	                    <textarea name="content" id="content" class="materialize-textarea" >{{old('content')}}</textarea>
	                    @if($errors->has('content'))
	                        <span>{{$errors->first('content')}}</span>
	                    @endif
	                </div>
	            </div>
	            <div class="row">
	                <div class="input-field col s12">
	                    <select name="category_id" id="category_id" >
	                        <option value="0">Non catégorisé</option>
	                        @forelse($categories as $id=> $name)
	                            <option  value="{{$id}}">{{$name}}</option>
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
	                            <input name="tags[]" class="filled-in" id="tag{{$id}}" value="{{$id}}" type="checkbox" >
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
	                            <option {{check_select('user', $id)}}  value="{{$id}}">{{$name}}</option>
	                        @empty
	                        @endforelse
	                    </select>
	                    <label for="user_id">Auteur</label>
	                </div>
	            </div>
	            <div class="row">
	                <div class="input-field col s12">
	                    <input class="datepicker" type="date" name="publish_at" id="publish_at" value="{{old('publish_at')}}">
	                    <label for="publish_at">Date de publication</label>
	                </div>
	            </div>
	            <div class="row">
	                <div class="input-field col s12 input-margin">
	                    <input {{check_radio('status', 'published')}} type="radio" name="status" value="published" id="published" >
	                    <label for="published">Publié</label>
	                    <input {{check_radio('status', 'unpublished')}} type="radio" name="status" value="unpublished" id="unpublished" checked>
	                    <label for="unpublished">Dépublié</label>
	                    <input {{check_radio('status', 'draft')}} type="radio" name="status" id="draft" value="draft" >
	                    <label for="draft">Brouillon</label>
	                </div>
	            </div>
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
                <div class="input-field col s12">
                    <p><input class="btn waves-effect waves-light" type="submit" ></p>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
<script>
	(function($){
		$('select').material_select();
		$('.datepicker').pickadate({
			format: 'yyyy-m-d'
		});
	})(jQuery)
    
</script>




@endsection
