<!-- ***** Welcome Area Start ***** -->
<div class="welcome-area" id="welcome">

    <!-- ***** Header Text Start ***** -->
    <div class="header-text">
        <div class="container">
            <div class="row">
                <div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 col-md-12 col-sm-12">
                    <h1>We provide the best <strong>strategy</strong><br>to grow up your <strong>business</strong>
                    </h1>
                    <p>Softy Pinko is a professional Bootstrap 4.0 theme designed by Template Mo
                        for your company at absolutely free of charge</p>
                    <a href="#features" class="main-button-slider">Discover More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Header Text End ***** -->
</div>
<!-- ***** Welcome Area End ***** -->

<!-- ***** Features Small Start ***** -->
<section class="section home-feature">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <!-- ***** Features Small Item Start ***** -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12"
                        data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                        <div class="features-small-item">
                            <div class="icon">
                                <i><img src="{{ asset('assets/frontend/images/featured-item-01.png') }}" alt=""></i>
                            </div>
                            <h5 class="features-title">Total Positif Di dunia</h5>
                            <h3><?php echo $dupos['value']; ?></h3>
                        </div>
                    </div>
                    <!-- ***** Features Small Item End ***** -->

                    <!-- ***** Features Small Item Start ***** -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12"
                        data-scroll-reveal="enter bottom move 50px over 0.6s after 0.4s">
                        <div class="features-small-item">
                            <div class="icon">
                                <i><img src="{{ asset('assets/frontend/images/featured-item-02.png') }}" alt=""></i>
                            </div>
                            <h5 class="features-title">Total Sembuh Di dunia</h5>
                            <h3><?php echo $dusem['value']; ?></h3>
                        </div>
                    </div>
                    <!-- ***** Features Small Item End ***** -->

                    <!-- ***** Features Small Item Start ***** -->
                    <div class="col-lg-3 col-md-8 col-sm-8 col-12"
                        data-scroll-reveal="enter bottom move 50px over 0.6s after 0.6s">
                        <div class="features-small-item">
                            <div class="icon">
                                <i><img src="{{ asset('assets/frontend/images/featured-item-03.png') }}" alt=""></i>
                            </div>
                            <h5 class="features-title">Total Meninggal Di dunia</h5>
                            <h3><?php echo $dumen['value']; ?></h3>
                        </div>
                    </div>
                    <!-- ***** Features Small Item End ***** -->

                    <!-- ***** Features Small Item Start ***** -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12"
                        data-scroll-reveal="enter bottom move 50px over 0.6s after 0.6s">
                        <div class="features-small-item">
                            <div class="icon">
                                <i><img src="{{ asset('assets/frontend/images/featured-item-04.png') }}" alt=""></i>
                            </div>
                            <h5 class="features-title">INDONESIA</h5>
                            <h5 class="features-title"><b>{{ $positif }}</b> positif, <b>{{ $sembuh }}</b>
                                sembuh, <b>{{ $meninggal }}</b> meninggal</h5>
                        </div>
                    </div>
                    <!-- ***** Features Small Item End ***** -->
                    <div class="col text-center">
                        <h6>
                            <p>Update terakhir : {{ $tanggal }}</p>
                        </h6>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ***** Features Small End ***** -->

<!-- ======== Table Section ======== -->
<section id="provinsi" class="provinsi section padding-top-70 padding-bottom-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><b>DATA INDONESIA</b></div>
                    <div class="card-body">
                        <table id="example" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <center>No</center>
                                    </th>
                                    <th scope="col">
                                        <center>Provinsi</center>
                                    </th>
                                    <th scope="col">
                                        <center>Jumlah Positif</center>
                                    </th>
                                    <th scope="col">
                                        <center>Jumlah Sembuh</center>
                                    </th>
                                    <th scope="col">
                                        <center>Jumlah Meninggal</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp

                                @foreach ($tampil as $tmp)
                                    <tr>
                                        <th scope="row">
                                            <center>{{ $no++ }}</center>
                                        </th>
                                        <td>
                                            <center>{{ $tmp->nama_provinsi }}</center>
                                        </td>
                                        <td>
                                            <center>{{ number_format($tmp->Positif) }}</center>
                                        </td>
                                        <td>
                                            <center>{{ number_format($tmp->Sembuh) }}</center>
                                        </td>
                                        <td>
                                            <center>{{ number_format($tmp->Meninggal) }}</center>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======== End Table Section ======== -->

<!-- ======== Table Section Global ======= -->
<section id="global" class="global provinsi section padding-top-70 padding-bottom-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><b>DATA NEGARA</b></div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <center>No</center>
                                    </th>
                                    <th scope="col">
                                        <center>Negara</center>
                                    </th>
                                    <th scope="col">
                                        <center>Jumlah Positif</center>
                                    </th>
                                    <th scope="col">
                                        <center>Jumlah Sembuh</center>
                                    </th>
                                    <th scope="col">
                                        <center>Jumlah Meninggal</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($dunia as $data)
                                    <tr>
                                        <td> <?php echo $no++; ?></td>
                                        <td> <?php echo $data['attributes']['Country_Region']; ?></td>
                                        <td> <?php echo number_format($data['attributes']['Confirmed']);
                                            ?></td>
                                        <td><?php echo number_format($data['attributes']['Recovered']);
                                            ?></td>
                                        <td><?php echo number_format($data['attributes']['Deaths']); ?></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======== End Table Section Global ======= -->

@section('js')
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>

    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });

    </script>
@endsection
