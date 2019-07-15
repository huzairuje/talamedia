<div class="menu-mobile">
    <ul class="main-menu-m">
        @foreach($categoryName as $categoryNames)
        <li>
            <a href="{{route('category', $categoryNames->name)}}">#{{ $categoryNames->name }}</a>
        </li>
        @endforeach
    </ul>
</div>
