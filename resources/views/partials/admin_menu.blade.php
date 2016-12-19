<ul class="right hide-on-med-and-down">
   @if(!auth()->guest())
        <li><i class="large material-icons">perm_identity</i></li>
        <li> Hello {{Auth::user()->name}} <small>({{Auth::user()->role}})</small></li>
        <li><a href="{{url('logout')}}">Déconnexion</a></li>
        <li><a href="{{url('admin/post')}}">Dashboard</a></li>
   @endif
        <li><a href="{{route('home')}}">Retour site public</a></li>
</ul>
<ul class="side-nav" id="mobile-menu">
    @if(!auth()->guest())
        <li><i class="large material-icons">perm_identity</i></li>
        <li> Hello {{Auth::user()->name}} <small>({{Auth::user()->role}})</small></li>
        <li><a href="{{url('logout')}}">Déconnexion</a></li>
        <li><a href="{{url('admin/post')}}">Dashboard</a></li>
    @endif
    <li><a href="{{route('home')}}">Retour site public</a></li>
</ul>