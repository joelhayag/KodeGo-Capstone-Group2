<div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
    <div class="hero__text">
        <span>{{ $banners ? $banners->product->banner_department($banners->product->product_department_id)->department_name : 'banner department' }}</span>
        <h2>{{ $banners ? $banners->banner_desc : 'banner desc' }}</h2>
        <p>Free Pickup and Delivery Available</p>
        <a href="shopdetails/{{ $banners ? $banners->product->id : 0 }}" class="primary-btn">SHOP NOW</a>
    </div>
</div>
