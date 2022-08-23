@extends('templates.master')

@section('content')
    <div class="content-wrapper">
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb bg-light">
                <li class="breadcrumb-item active" aria-current="page">Service</li>
            </ol>
        </nav>

        <div class="row">

            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Data Service</h6>
                        <hr />

                        <div class="card-block table-responsive">
                            <a href="#" class="btn btn-success btn-sm">Tambah</a>
                            <br><br>
                            <table id="" class="table table-striped table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>nama kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
@endsection


