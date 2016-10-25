<ul class="dropdown-menu">
    @foreach ($items as $item => $texto)
        <li><a href="{{ route($item) }}">{{ $texto }}</a></li>
    @endforeach
</ul>
