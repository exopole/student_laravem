@extends('layouts.admin')

@section('content')
    <p>
        <a class="waves-effect waves-light btn" href="{{url('admin/post/create')}}">Ajouter un post</a></p>
    <table class="bordered">
        <thead>
        <tr>
            <th data-field="id">Statut</th>
            <th data-field="titre">Titre</th>
            <th data-field="category">Catégorie</th>
            <th data-field="publish_at">Date de publication</th>
            <th data-field="author">Auteur</th>
            <th data-field="delete">Suppression</th>
        </tr>
        </thead>
        @forelse($posts as $post)
        <tr>
            <td><button class="btn {{color_status($post->status)}}">{{$post->status}}</button></td>
            <td>
                <a href="{{url('admin', ['post', $post->id, 'edit'])}}"><i class="material-icons">mode_edit</i></a>
               {{$post->title}}
            </td>
            <td>{{$post->category? $post->category->title : 'non catégorisé'}}</td>
            <td>{{(isset($post->publish_at))? $post->publish_at : "No date"}}</td>
            <td>{{$post->user? $post->user->name : 'anonymous'}}</td>
            <td>
                <button data-id="{{$post->id}}" data-target="modal1" class="btn-delete btn modal-trigger">Supprimer</button>
            </td>
        </tr>
        @empty
        @endforelse
    </table>
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Est-vous sûr de vouloir supprimer ce post ????</h4>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Oui</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Non</a>
    </div>
</div>
@endsection

@section('script')
<script>
    $('.btn-delete').bind('click', function(e){
       let id = $(this).data('id')
        $('.modal-action').bind('click', function(){
            let response = $(this).text()
            if(response == 'Oui') {
                $.ajax({
                    url: '{{url('admin/post')}}/' + id,
                    type: 'post',
                    data: {
                        _method : 'delete',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data){
                       console.log(data.message)
                        setInterval(function() {
                            window.location.reload();
                        }, 1000);
                    },
                    error: function()
                    {
                        console.log('errors')
                    }
                })
            }
        });
    });
    $('.modal-trigger').leanModal();
</script>

@endsection