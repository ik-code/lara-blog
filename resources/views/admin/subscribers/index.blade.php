@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Subscriber List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

{{--        <div>
            <a href="{{ route('subscribers.create') }}" class="btn btn-primary mb-3 mt-3">Add Subscriber</a>
        </div>--}}
        <!-- Default box -->
        <div class="card">

            <div class="card-header">
                <h3 class="card-title">Subscriber List</h3>


                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body table-responsive">
                @if(count($subscribers))
                    <table class="table table-bordered table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subscribers as $subscriber)
                            <tr>
                                <td>{{ $subscriber->id }}.</td>
                                <td>{{ $subscriber->email }}</td>
                                <td>
{{--                                    <a href="{{ route('subscribers.edit', [ 'subscriber' => $subscriber->id ]) }}" class="btn btn-info btn-sm float-left mr-1">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>--}}
                                    <form action="{{ route('subscribers.destroy', [ 'subscriber' => $subscriber->id ]) }}" method="post" class="float-left">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure to delete this subscriber?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                @else
                    <div>

                    </div>
                    <div class="alert alert-warning" role="alert">
                        Any Subscriber is not found!
                    </div>
                @endif
            </div>
            <!-- /.card-body -->
            <div class="card-footer d-flex justify-content-end">
                @if(!empty($subscribers))
                    {{ $subscribers->links() }}
                @endif
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
