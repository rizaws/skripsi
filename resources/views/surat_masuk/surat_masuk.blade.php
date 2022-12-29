@extends('theme.app')
@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>{{ $title }}</h3>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        @php
                            $user = DB::table('users')->get();
                            $userC = DB::table('users')->count();
                        @endphp
                        <h4 class="card-title">Jumlah : {{ $userC }}</h4>
                        <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                            data-bs-target="#default">
                            Launch Modal
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="table" id="table3">
                            <thead>

                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Emai</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $no => $u)
                                    <tr>
                                        <td>{{ $no + 1 }}</td>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td>{{ $u->created_at }}</td>
                                        <td>{{ $u->updated_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>

    </div>
    <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">
                        Basic Modal
                    </h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Bonbon caramels muffin. Chocolate bar oat cake
                        cookie pastry dragée pastry. Carrot cake chocolate
                        tootsie roll chocolate bar candy canes biscuit.
                        Gummies bonbon apple pie fruitcake icing biscuit
                        apple pie jelly-o sweet roll. Toffee sugar plum
                        sugar plum jelly-o jujubes bonbon dessert carrot
                        cake. Cookie dessert tart muffin topping donut
                        icing fruitcake. Sweet roll cotton candy dragée
                        danish Candy canes chocolate bar cookie.
                        Gingerbread apple pie oat cake. Carrot cake
                        fruitcake bear claw. Pastry gummi bears
                        marshmallow jelly-o.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Accept</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#table3').DataTable();
        });
    </script>
@endsection
