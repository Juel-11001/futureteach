@php
    $categories= \App\Models\Category::where('status', 1)
    ->with(['subCategories'=> function($query){
        $query->where('status', 1)
        ->with(['childCategories'=>function ($query) {
            $query->where('status', 1);
        }]);
    }])
    ->get();

@endphp
<div class="header-bottom mb-0 header-sticky stick d-none d-lg-block d-xl-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Begin Header Bottom Menu Area -->
                <div class="hb-menu">
                    <nav>
                        <ul>
                            {{-- <li class="dropdown-holder"><a href="index.html">Home</a>
                                <ul class="hb-dropdown">
                                    <li><a href="index.html">Home One</a></li>
                                    <li><a href="index-2.html">Home Two</a></li>
                                    <li><a href="index-3.html">Home Three</a></li>
                                    <li><a href="index-4.html">Home Four</a></li>
                                </ul>
                            </li>
                            <li class="catmenu-dropdown megamenu-holder"><a href="shop-left-sidebar.html">Shop</a>
                                <ul class="megamenu hb-megamenu">
                                    <li><a href="shop-left-sidebar.html">Shop Page Layout</a>
                                        <ul>
                                            <li><a href="shop-3-column.html">Shop 3 Column</a></li>
                                            <li><a href="shop-4-column.html">Shop 4 Column</a></li>
                                            <li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
                                            <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                            <li><a href="shop-list.html">Shop List</a></li>
                                            <li><a href="shop-list-left-sidebar.html">Shop List Left Sidebar</a></li>
                                            <li><a href="shop-list-right-sidebar.html">Shop List Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="single-product-gallery-left.html">Single Product Style</a>
                                        <ul>
                                            <li><a href="single-product-carousel.html">Single Product Carousel</a></li>
                                            <li><a href="single-product-gallery-left.html">Single Product Gallery Left</a></li>
                                            <li><a href="single-product-gallery-right.html">Single Product Gallery Right</a></li>
                                            <li><a href="single-product-tab-style-top.html">Single Product Tab Style Top</a></li>
                                            <li><a href="single-product-tab-style-left.html">Single Product Tab Style Left</a></li>
                                            <li><a href="single-product-tab-style-right.html">Single Product Tab Style Right</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="single-product.html">Single Products</a>
                                        <ul>
                                            <li><a href="single-product.html">Single Product</a></li>
                                            <li><a href="single-product-sale.html">Single Product Sale</a></li>
                                            <li><a href="single-product-group.html">Single Product Group</a></li>
                                            <li><a href="single-product-normal.html">Single Product Normal</a></li>
                                            <li><a href="single-product-affiliate.html">Single Product Affiliate</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li> --}}
                            @foreach ($categories as $category)
                                
                            <li class="{{($category->subCategories->count() > 0) ? 'dropdown-holder' : ''}}"><a href="#">{{$category->name}}</a>
                                @if ($category->subCategories->count() > 0)
                                    
                                <ul class="hb-dropdown">
                                    @foreach ($category->subCategories as $sub_category)
                                        
                                    <li class=" {{count($sub_category->childCategories)>0 ? 'sub-dropdown-holder' : ''}}"><a href="blog-left-sidebar.html">{{$sub_category->name}}</a>
                                        <ul class=" {{count($sub_category->childCategories)>0 ? 'hb-dropdown hb-sub-dropdown' : ''}}">
                                            @foreach ($sub_category->childCategories as $childCategory)
                                                <li><a href="">{{$childCategory->name}}</a></li>
                                                @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
                <!-- Header Bottom Menu Area End Here -->
            </div>
        </div>
    </div>
</div>