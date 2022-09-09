<div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
    <div class="hero__text">
        <span>{{ $banners->product->banner_department($banners->product->product_department_id)->department_name }}</span>
        <h2>{{ $banners->banner_desc }}</h2>
        <p>Free Pickup and Delivery Available</p>
        <a href="#" class="primary-btn">SHOP NOW</a>
    </div>
</div>
