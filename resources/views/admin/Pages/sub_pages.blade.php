@foreach ($subages as $subage)
    <option 
        @if(isset($cmspage->id) && $subage->id == $cmspage->id)
            selected = 'selected'
        @endif value="{{ $subage->id }}">{{ $parent}} -> {{ $subage->title }}</option>

    @if (count($subage->subpages) > 0)
        @php
            // Creating parents list separated by ->.
            $parents = $parent . '->' . $subage->title;
        @endphp
        @include('admin.Pages.sub_pages',['subages' => $subage->subpages, 'parent' => $parents,'cmspage'=>$cmspage])
    @endif
@endforeach

{{-- @foreach($subages as $subage)
    <ul>
        <li>{{$subage->title}}</li>
        @if(count($subage->subpages))
            @include('admin.Pages.sub_pages',['subages' => $subage->subpages])
        @endif
    </ul>
@endforeach --}}