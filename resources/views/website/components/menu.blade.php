<div class="mainmenu pull-left">
    <ul class="nav navbar-nav collapse navbar-collapse">
        @foreach($menus as $menukey => $menu)
            <li><a href="{{route('website.index',[$menu->slug])}}" class="{{$menukey==0?'active':''}}">{{$menu->name}}</a>
                    @if($menu->menuChildrent->count())
                        <i class="fa fa-angle-down"></i></a>
                    @endif
                <ul role="menu" class="sub-menu">
                    @foreach($menu->menuChildrent as $menuChildrent)
                        @if($menu->menuChildrent->count())
                            <li><a href="">{{$menuChildrent->name}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</div>
