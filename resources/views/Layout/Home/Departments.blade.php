<div class="hero__categories__all">
    <i class="fa fa-bars"></i>
    <span>All departments</span>
</div>
<ul>
    @if ($departments)
        @foreach ($departments as $department)
            <li><a href="#">{{ $department->department_name }}</a></li>
        @endforeach
    @else
        <li><a href="#">Fresh Meat</a></li>
        <li><a href="#">Vegetables</a></li>
        <li><a href="#">Fruit & Nut Gifts</a></li>
        <li><a href="#">Fresh Berries</a></li>
        <li><a href="#">Ocean Foods</a></li>
        <li><a href="#">Butter & Eggs</a></li>
        <li><a href="#">Fastfood</a></li>
        <li><a href="#">Fresh Onion</a></li>
        <li><a href="#">Papayaya & Crisps</a></li>
        <li><a href="#">Oatmeal</a></li>
        <li><a href="#">Fresh Bananas</a></li>
    @endif
</ul>
