@foreach($subages as $subage)
    <ul>
        <li><a itemprop="url" href="/<?php echo $parent;?>/<?php echo $subage->slug;?>" title="">{{$subage->title}} </a></li>
        
        @if(count($subage->subpages))
            @php
                // Creating parents list separated by ->.
                $parents = $parent . '/' . $subage->slug;
            @endphp
            @include('layouts.sub_pages',['subages' => $subage->subpages, 'parent' => $parents])
        @endif
    </ul>
@endforeach