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
                                <h4 style="color: white">All Categories<a href="{{ url('categories/create') }}" class="btn btn-success float-end">Create Category</a></h4>
                            </div>
                            @csrf

                            <div class="table-responsive">
                                <table class="table align-items-center">
                                    <thead>
                                        <tr>
                                            <th class="text-secondary opacity-14">ID</th>
                                            <th class="text-secondary opacity-14">Image</th>
                                            <th class="text-secondary opacity-14">Name</th>
                                            <th class="text-secondary opacity-14">Description</th>
                                            <th class="text-secondary opacity-14"></th>
                                            <th class="text-secondary opacity-14"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category )
                                        <tr>
                                            <td class="text-md font-weight-normal ps-4">{{ $category->id }}</td>
                                            <td style="width: 100px;">
                                                <img src="/assets/uploads/category/{{ $category->image }}" class="img-thumbnail img-responsive">
                                            </td>
                                            <td class="text-md font-weight-normal ps-4" style="color:#343a40">{{$category->name }}</td>
                                            <td class="text-md font-weight-normal ps-4">{{ $category->description }}</td>
                                            <td><a href= "{{ route('categories.edit', $category->id) }}" class="btn btn-outline-secondary">Edit</a></td>
                                            <td>
                                                <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf

                                                    <button class="btn btn-primary" type="submit">Delete</button>
                                                </form>
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
