<ul class="nav navbar-nav">
    @foreach ($items as $item => $texto)
        <li role="presentation" {!! Html::classes(['active' => Route::is($item)]) !!}>
            <a href="{{ route($item) }}">{{ $texto }}</a>
        </li>
    @endforeach
</ul>
