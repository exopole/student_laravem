@if(isset($categories) && count($categories) > 0)
    <ul class="right hide-on-med-and-down">
       @if(!auth()->guest())
           <li><a href="{{url('admin/post')}}">Dashboard</a></li>
       @endif
        <li><a class="header__menu-link" href="{{route('home')}}">Home</a></li>
        @foreach($categories as $category)
            <li>
                <a class="header__menu-link" href="{{url('category', [$category->id, str_slug($category->title)])}}">{{$category->title}}</a>
            </li>
        @endforeach
    </ul>
    <ul class="side-nav" id="mobile-menu">
        @if(!auth()->guest())
            <li><a href="{{url('admin/post')}}">Dashboard</a></li>
        @endif
        <li><a class="header__menu-link" href="{{route('home')}}">Home</a></li>
        @foreach($categories as $category)
            <li>
                <a class="header__menu-link" href="{{url('category', [$category->id, str_slug($category->title)])}}">{{$category->title}}</a>
            </li>
        @endforeach
    </ul>
@else
no categories
@endif