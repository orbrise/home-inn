<nav class="drawer-nav" role="navigation">
  <ul class="drawer-menu">
    <li class="drawer-brand">Categories</li>

    @forelse($navs as $nav)
      @if(count($nav->Subcats) >= 1)
        <li class="drawer-dropdown">
          <a href="{{url('/category')}}/{{strtolower($nav->slug)}}" class="drawer-menu-item" data-toggle="dropdown" role="button" aria-expanded="false">
            {{$nav->name}}
            <span class="drawer-caret"></span>
          </a>
          <ul class="drawer-dropdown-menu links">
            @forelse($nav->Subcats as $level1)
              @if($level1->SubcatsChild)
                <li>
                  <a href="{{url('/category')}}/{{strtolower($level1->slug)}}"> {{$level1->name}}</a>
                  <ul class="links">
                    @forelse($level1->SubcatsChild as $level2)
                      <li class="drawer-menu-item" > > <a  href="{{url('/category')}}/{{strtolower($level2->slug)}}">{{$level2->name}}</a></li>
                    @empty
                    @endforelse
                  </ul>
                </li>
              @else
                <li> <a class="drawer-menu-item" href="{{ url('/category/')}}/{{strtolower($nav->slug)}}">{{$nav->name}}</a> </li>
                @endif
                @empty
                @endforelse

          </ul>
        </li>
      @else
        <li> <a class="drawer-menu-item" href="{{ url('/category/')}}/{{strtolower($nav->slug)}}">{{$nav->name}}</a> </li>
      @endif
    @empty
    @endforelse
  </ul>
</nav>
<script>
    $("div.dropdown-backdrop").removeClass("dropdown-backdrop");
</script>