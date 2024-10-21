<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Banner utama -->
    <div id="main-banner" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="path/to/banner-image.jpg" class="d-block w-100" alt="New Catalog">
                <div class="carousel-caption">
                    <h1>THE NEW CATALOG IS HERE</h1>
                    <p><a class="btn btn-primary" href="#">Shop now!</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Kategori Produk -->
    <div class="row text-center my-5">
        <div class="col-md-4">
            <h3>Women's Clothing</h3>
            <p>Get up to 40% off</p>
            <a href="#" class="btn btn-dark">Shop Now</a>
        </div>
        <div class="col-md-4">
            <h3>Men's Clothing</h3>
            <p>Get up to 40% off</p>
            <a href="#" class="btn btn-dark">Shop Now</a>
        </div>
        <div class="col-md-4">
            <h3>Juniors' Clothing</h3>
            <p>Get up to 40% off</p>
            <a href="#" class="btn btn-dark">Shop Now</a>
        </div>
    </div>

    <!-- Produk Unggulan -->
    <h2 class="text-center mb-5">Featured Products</h2>
    <div class="row text-center">
        <!-- Produk 1 -->
        <div class="col-md-3">
            <img src="path/to/product1.jpg" class="img-fluid" alt="Product 1">
            <h4>Kennecott Patch Pocket Quilted Coat</h4>
            <p>$399.00</p>
            <a href="#" class="btn btn-dark">Add to cart</a>
        </div>
        <!-- Produk 2 -->
        <div class="col-md-3">
            <img src="path/to/product2.jpg" class="img-fluid" alt="Product 2">
            <h4>Knit Skater Skirt (Juniors)</h4>
            <p>$420.00</p>
            <a href="#" class="btn btn-dark">Add to cart</a>
        </div>
        <!-- Produk 3 -->
        <div class="col-md-3">
            <img src="path/to/product3.jpg" class="img-fluid" alt="Product 3">
            <h4>Cashmere Sweater</h4>
            <p><span class="old-price">$509.00</span> $309.00</p>
            <a href="#" class="btn btn-dark">Add to cart</a>
        </div>
        <!-- Produk 4 -->
        <div class="col-md-3">
            <img src="path/to/product4.jpg" class="img-fluid" alt="Product 4">
            <h4>Cotton Blouse (Regular & Petite)</h4>
            <p>$420.00</p>
            <a href="#" class="btn btn-dark">Add to cart</a>
        </div>
    </div>

    <!-- Custom Blocks -->
    <div class="row mt-5 bg-dark text-white p-5">
        <div class="col-md-4 text-center">
            <h3>Custom Block 1</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="col-md-4 text-center">
            <h3>Custom Block 2</h3>
            <p>Tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="col-md-4 text-center">
            <h3>Custom Block 3</h3>
            <p>Excepteur sint occaecat cupidatat non proident.</p>
        </div>
    </div>
</div>
@endsection
