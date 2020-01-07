@php
    $value = config('sidebar.menu');
    $url = Route::currentRouteName();
    $prefix = explode('.' , $url);
@endphp

<div class="page-sidebar sidebar">
    <div class="page-sidebar-inner slimscroll">
        <ul class="menu accordion-menu">
        @foreach ($value as $element)
            @if (isset($element['type']))
                @if ($element['type'] == 'simple')
                    @php
                        $entity = explode('.' , $element['url']);
                    @endphp
                    <li class="@if ($prefix[0] == $entity[0]) active @endif">
                        <a href="{{ route($element['url']) }}" class="waves-effect waves-button" style="overflow:hidden">
                            <span class="menu-icon glyphicon glyphicon-{{ $element['ico'] }}" style="float:left; margin-bottom:4px"></span>
                            <p style="width:80%; display:inline-block;float:left;text-align:left;padding-left:10px"> {{ $element['text'] }} </p>
                        </a>
                    </li>
                                 
                @endif

                @if ($element['type'] == 'tree')
                <li class="droplink n1">
                    <a href="#" class="waves-effect waves-button" style="overflow:hidden">
                        <span class="menu-icon glyphicon glyphicon-{{ $element['ico'] }}" style="float:left; margin-bottom:4px" ></span>
                        <p style="width:80%; display:inline-block;float:left;text-align:left;padding-left:10px"> {{ $element['text'] }} </p>
                        <span class="arrow" style="float:right;position:relative;top:20px"></span>
                    </a>
                    <ul class="sub-menu">
                    @foreach ($element['children'] as $elem)
                    
                        @if ($elem['type'] == 'one')
                            @php
                                $entity = explode('.' , $elem['url']);
                            @endphp
                            <li class="child @if ($prefix[0] == $entity[0]) active @endif">
                                <a style="overflow:hidden;text-align:left;padding-left: 35px"  href="{{ route($elem['url']) }}">{{ $elem['text'] }}</a>
                            </li>
                        @else
                            <li class="droplink n2">
                                <a href="#" class="waves-effect waves-button" style="overflow:hidden">
                                    <span class="menu-icon glyphicon glyphicon-{{ $elem['ico'] }}" style="font-size:15px;float:left; margin-bottom:0px;margin-top:5px"></span>
                                    <p style="width:80%; display:inline-block;float:left;text-align:left;padding-left:10px;font-size:12px"> {{ $elem['text'] }} </p>
                                    <span class="arrow" style="float:right;position:relative;top:-15px"></span>
                                </a>
                                <ul class="sub-menu" style="display:none">
                                    @foreach ($elem['children'] as $e)
                                        @php
                                            $entity1 = explode('.' , $e['url']);
                                        @endphp
                                            <li class="child n3 @if ($prefix[0] == $entity1[0]) active @endif">
                                                <a href="{{ route($e['url']) }}">{{ $e['text'] }}</a>
                                            </li>
                                        
                                    @endforeach 
                                </ul>
                            </li> 
                        @endif
                    @endforeach 
                    </ul>
                </li>                    
                @endif
            @endif
        @endforeach
        </ul>
    </div><!-- Page Sidebar Inner -->
</div>

<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('li.active').closest('droplink').addClass('open')

        $('li.child.active').closest('li.n1').addClass('open')

        $('li.n3.active').closest('li.n2').addClass('open')
        $('li.n3.active').closest('li.n1').addClass('open')
    });
</script>