@extends('layout.main')

@section('content')
    <div class="vh-100 d-flex justify-content-center align-items-center flex-column"
        style="background-image: url('{{ URL::asset('images/listrindo.jpg') }}'); background-size: cover">
        <div style="max-width: 1000px; text-align: center;" class="text-white">
            <h1 class="font-weight-normal text-white" style="font-size: 70px; max-width: 1000px; text-align: center">
                MARI BERKONTRIBUSI NYATA UNTUK NEGERI
            </h1>
            <h5 class="my-3">
                Mulai beroperasi tahun 1993,
                Cikarang Listrindo menjadi Independent Power Producer (IPP) yang beroperasi paling lama di Indonesia,
                dengan kapasitas terpasang sebesar 1.144MW. Cikarang Listrindo melayani 5 (lima) Kawasan Industri yang terbesar dan paling berkembang di Indonesia.
            </h5>
            @if(!$user)
            <a class="btn btn-warning" href="/create"> Login Now </a>
            @endif
        </div>
    </div>
    <div id='about' style="background-image:url('https://pcpm35rekrutmenbi.id/assets/images/bacground_white.jpg')"
        class="py-5">
        <div class="container py-5">
            <h1 class="fs-1 text-center">
                Visi PT Cikarang Listrindo
            </h1>
            <div class="bg-warning rounded mb-2" style="padding: 2px">
            </div>
            <p>
                Menjadi produsen listrik kelas dunia.
            </p>
            <h1 class="fs-1 text-center mt-5">
                Misi PT Cikarang Listrindo
            </h1>
            <div class="bg-warning rounded mb-2" style="padding: 2px">
            </div>
            <p>
                Unggul dalam industri penyediaan tenaga listrik dengan kerjasama tim yang baik untuk memenuhi kebutuhan pelanggan akan tenaga listrik yang aman, andal, bersih, dan efisien dengan cara yang ramah dan profesional.
            </p>
        </div>
        <div class="container my-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <h5 class="card-header">Trending</h5>
                        <div class="card-body">
                            <h5 class="card-title">Cek Lowongan</h5>
                            <p class="card-text">Terdapat 3 lowongan pekerjaan yang tersedia.
                            </p>
                            <a href="/lowongan" class="btn btn-warning">Cek Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <h5 class="card-header">Trending</h5>
                        <div class="card-body">
                            <h5 class="card-title">Pengumuman Penerimaan</h5>
                            <p class="card-text">Pengumuman penerimaan pelamar dengan periode pendaftaran bulan november.
                            </p>
                            <a href="{{route('user.index')}}" class="btn btn-warning">Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container my-5">
            <h1 class="fs-1 mb-4">
                Frequently Asked Question
            </h1>
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                Penempatan akan sesuai dengan bidang atau tidak ?
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            Penempatan disesuaikan dengan bidang pekerjaan yang dipilih saat mengajukan aplikasi.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Lokasi Penempatan ?
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            Lokasi penempatan sesuai dengan yang tercantum di dalam Job Vacancies.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Lamanya Tes ?
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                            Terdapat dua jenis tes yang harus dilalui yaitu tes kemampuan Bahasa Inggris secara online dan Assessment Day.
                            Assessment on line dijadwalkan dalam satu hari, sementara Assessment Day 2 hari, terdapat jeda antara tes online dan assessment day.
                            Lamanya tes sampai pengumuman antara 1,5 - 2 bulan.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
