<!DOCTYPE html>
<html lang="en">
<head>
@include('page.partials.head')
</head>
<body>
@include('page.partials.header')
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>@yield('title page')</h2>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Page title area -->
@yield('content')

@include('page.partials.footer')
@include('page.partials.js')
</body>
</html>
