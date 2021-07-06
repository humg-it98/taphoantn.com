@extends("layout")
@section("content")


  <div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li class="active">Sản phẩm đã xem</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!--Wishlist Area Strat-->
<div class="wishlist-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form>
                    <div class="table-content table-responsive">
                        <table class="table">
                                        <div id="row_viewed"></div>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
