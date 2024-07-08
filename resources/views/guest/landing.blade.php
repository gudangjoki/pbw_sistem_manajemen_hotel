
<!-- Hero Section -->
<div class="hero-section">
    <h1>Welcome to Our Hotel</h1>
    <p>Experience luxury and comfort like never before.</p>
    <a href="#rooms" class="btn btn-primary btn-lg">Explore Our Rooms</a>
</div>

<!-- Room Types Section -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <h2 id="rooms" class="mb-5">Our Rooms</h2>
                </div>
                @foreach($tipe_kamars as $tipe_kamar)
                <div class="col-md-4 mb-4">
                    <div class="card room-card">
                        <div class="room-rating">9.0</div>
                        <img src="{{ asset('img/background.jpg') }}" class="card-img-top" alt="Deluxe Room">
                        <div class="room-card-body">
                            <h5 class="card-title">{{ $tipe_kamar['nama_tipe_kamar'] }}</h5>
                            <p class="card-text">{{ $tipe_kamar['deskripsi'] }}</p>
                            <p class="room-price">{{ $tipe_kamar['harga_kamar'] }}</p>
                            <a href="{{ url('/guest/dashboard/detail_' . $tipe_kamar['id_tipe_kamar']) }}" class="btn btn-primary float-right">View Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- <div class="col-md-4 mb-4">
                    <div class="card room-card">
                        <div class="room-rating">8.5</div>
                        <img src="{{ asset('img/background.jpg') }}" class="card-img-top" alt="Suite">
                        <div class="room-card-body">
                            <h5 class="card-title">Suite</h5>
                            <p class="card-text">Experience the ultimate in luxury and comfort.</p>
                            <p class="room-price">IDR 2,500,000</p>
                            <a href="/guest/dashboard/detail" class="btn btn-primary float-right">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card room-card">
                        <div class="room-rating">8.0</div>
                        <img src="{{ asset('img/background.jpg') }}" class="card-img-top" alt="Standard Room">
                        <div class="room-card-body">
                            <h5 class="card-title">Standard Room</h5>
                            <p class="card-text">Comfortable and affordable accommodation.</p>
                            <p class="room-price">IDR 750,000</p>
                            <a href="#" class="btn btn-primary float-right">View Details</a>
                        </div>
                    </div>
                </div> -->
            </div>

            <!-- Facilities Section -->
            <div class="facilities-section">
                <div class="container">
                    <div class="row mt-5">
                        <div class="col-12 text-center">
                            <h2 class="mb-5">Our Facilities</h2>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="facility-item text-center">
                                <div class="facility-icon mb-3">
                                    <i class="fas fa-swimming-pool"></i>
                                </div>
                                <h5 class="facility-title">Swimming Pool</h5>
                                <p class="facility-text">Enjoy a refreshing swim in our outdoor pool.</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="facility-item text-center">
                                <div class="facility-icon mb-3">
                                    <i class="fas fa-spa"></i>
                                </div>
                                <h5 class="facility-title">Spa & Wellness</h5>
                                <p class="facility-text">Relax and rejuvenate with our spa services.</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="facility-item text-center">
                                <div class="facility-icon mb-3">
                                    <i class="fas fa-concierge-bell"></i>
                                </div>
                                <h5 class="facility-title">24/7 Concierge</h5>
                                <p class="facility-text">Our concierge service is available 24/7.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Top Destinations Section -->
            <div class="content-wrapper">
                <div class="container">
                    <div class="row mt-5">
                        <div class="col-12 text-center">
                            <h2 class="mb-5">Top Destinations</h2>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card destination-card">
                                <img src="{{ asset('img/background.jpg') }}" class="card-img-top" alt="Destination 1">
                                <div class="card-body destination-card-body">
                                    <h5 class="card-title">Bali</h5>
                                    <p class="card-text">Explore the beautiful beaches and vibrant culture of Bali.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card destination-card">
                                <img src="{{ asset('img/background.jpg') }}" class="card-img-top" alt="Destination 2">
                                <div class="card-body destination-card-body">
                                    <h5 class="card-title">Yogyakarta</h5>
                                    <p class="card-text">Discover the rich history and heritage of Yogyakarta.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card destination-card">
                                <img src="{{ asset('img/background.jpg') }}" class="card-img-top" alt="Destination 3">
                                <div class="card-body destination-card-body">
                                    <h5 class="card-title">Jakarta</h5>
                                    <p class="card-text">Experience the bustling city life of Jakarta.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-wrapper -->
        </div>
    </div>
</div>