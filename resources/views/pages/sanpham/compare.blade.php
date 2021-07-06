@extends("layout")
@section("content")


  <div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li class="active">Sản phẩm so sánh</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!--Wishlist Area Strat-->
<div class="compare-area pt-60 pb-60">
    <div class="container">
        <div class="compare-table table-responsive">
            <table class="table table-bordered table-hover mb-0">
                <div id="row_compare"></div>
            </table>
        </div>
    </div>
</div>

@endsection
