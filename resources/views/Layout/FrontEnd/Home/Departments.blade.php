<div class="hero__categories__all">
    <i class="fa fa-bars"></i>
    <span>All departments</span>
</div>
<ul>
    @foreach ($departments as $department)
        @if($department->department_status == 'passed')
            <li><a href="#">{{ $department->department_name }}</a></li>
        @endif
    @endforeach
    <!--<li><a href="#">Fresh Meat</a></li>
    <li><a href="#">Vegetables</a></li>
    <li><a href="#">Fruit & Nut Gifts</a></li>
    <li><a href="#">Fresh Berries</a></li>
    <li><a href="#">Ocean Foods</a></li>
    <li><a href="#">Butter & Eggs</a></li>
    <li><a href="#">Fastfood</a></li>
    <li><a href="#">Fresh Onion</a></li>
    <li><a href="#">Papayaya & Crisps</a></li>
    <li><a href="#">Oatmeal</a></li>
    <li><a href="#">Fresh Bananas</a></li>-->
</ul>
