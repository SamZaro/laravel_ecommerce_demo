@extends('layouts.admin')

@section('content')
    <div class="container">
        <div id="wrapper">
            @include('layouts.inc.usersidebar')
            <div id="page-wrapper">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h4 class="text-white">User Account Details</h4>
                            </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <table class="table">
                                                <thead>
                                                  <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <th scope="row">Name</th>
                                                    <td>{{ $user->name }}</td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">Email</th>
                                                    <td>{{ $user->email }}</td>
                                                  </tr>
                                                  <tr>
                                                  </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
    </div> <!-- /#container -->
@endsection
