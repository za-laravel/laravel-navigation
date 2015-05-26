<div class="nav">
    <ul class="slimmenu" id="slimmenu">
            @foreach($items as $nav)
                 <li class="@if(Request::path() == $nav['item']['link']) active @endif"><a href= {{ $nav['item']['link'] }}>{{ $nav['item']['name'] }}</a>
                     @if(count($nav['children']))
                        <ul>
                            @foreach($nav['children'] as $subnav)
                                <li><a href= {{ $subnav['item']['link'] }}>{{ $subnav['item']['name'] }}</a></li>
                            @endforeach
                        </ul>
                     @endif
                 </li>
            @endforeach
    </ul>
</div>
