@extends('layouts.admin')

@section('content')
    <div class="container">
        <div id="wrapper">
            @include('layouts.inc.sidebar')
            <div id="page-wrapper">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary mb-4">
                                <h4 style="color: white">All Users</h4>
                            </div>

                            <div class="table-responsive">
                              <table class="table align-items-center">
                                <thead>
                                  <tr>
                                    <th class="text-secondary opacity-14">ID</th>
                                    <th class="text-secondary opacity-14">Name</th>
                                    <th class="text-secondary opacity-14">Email</th>
                                    <th class="text-secondary opacity-14">Registered</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                  <tr>
                                    <td class="text-md font-weight-normal ps-4">
                                        <p class="text-md text-secondary mb-0">{{ $user->id }}</p>
                                    </td>
                                    <td class="text-md font-weight-normal ps-4">
                                        <p class="text-md mb-0" style="color:#343a40">{{ $user->name }} </p>
                                    </td>
                                    <td class="text-md font-weight-normal ps-4">
                                        <p class="text-md text-secondary mb-0">{{ $user->email }} </p>
                                    </td>
                                    <td class="text-md font-weight-normal ps-4">
                                        <p class="text-md text-secondary mb-0">07/12/22 </p>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /#page-wrapper -->
        </div><!-- /#wrapper -->
    </div> <!-- /#container -->
@endsection
