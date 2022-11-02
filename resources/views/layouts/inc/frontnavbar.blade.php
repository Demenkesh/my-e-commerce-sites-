<!-- navbar -->
<nav class="navbar navbar-expand-lg" id="navbar">
    <div class="container-fluid">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <a class="navbar-brand" href="#"><img src="./image/logo.png" alt="" width="180px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="fa-solid fa-bars" style="color: white;"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Category
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #1c1c50;">
                        <li><a class="dropdown-item" href="{{ url('allcategories') }}">All Categories</a></li>
                        <li><a class="dropdown-item" href="{{ url('trendingcategory') }}">Trending</a></li>
                        <li><a class="dropdown-item" href="{{ url('featurecategory') }}">Feature</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ url ('about') }}">About Us</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ url ('contact') }}">Contact Us</a>
                </li>
            </ul>

            <form action="{{ url('searchproduct') }}" method="POST" class="d-flex">
                @csrf
                <input class="form-control me-2" name="product_name" id="search_product"type="search" required
                    placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit" id="search-btn">Search</button>
            </form>
        </div>
    </div>
</nav>
<!-- navbar -->
