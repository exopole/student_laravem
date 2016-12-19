@forelse($post->tags as $tag)
    <div class="chip">
    <a href="{{url('tag', $tag->id)}}">{{$tag->name}}</a>
    </div>
@empty
    pas de mot clé
@endforelse