@extends('layouts.app')

@section('title', 'All Customer')

@section('content')
    
<div class="row ">
    <div class="col-md-12">

    <a href="{{ route('customers.create') }}" class="btn btn-success mb-3">Add Product</a>

    <table id="datatable" class="display table-sm table-bordered " style="width:100%">
        <thead>
            <tr class="text-center">
                <th style="width: 7%">SL NO</th>
                <th style="width: 15%">Area</th>
                <th style="width: 10%">Code</th>
                <th>Name</th>
                <th style="width: 10%">Age</th>
                <th style="width: 10%">Status</th>
                <th style="width: 15%">Action</th>

            </tr>
        </thead>

        <tbody>

            @if ($customers)
                @foreach ($customers as $key => $customer)
                    <tr class="text-center">
                        <td><b>{{ ++$key }}</b></td>
                      <td>  {{ $customer->areas->name ?? 'null'  }}</td>
                        <td>{{ $customer->code ?? 'null' }}</td>
                        <td>{{ $customer->name ?? 'null' }}</td>
                        <td>{{ $customer->age ?? 'null' }}</td>
                        <td>
                            <form action="" method="post">
                                @csrf
                                @method('GET')

                                    @if ($customer->is_active == 1)
                                        <button type="submit" class="btn btn-success">Active</button>
                                    @else
                                        <button type="submit" class="btn btn-danger">Inactive</button>
                                    @endif

                                </form>

                        </td>
                        <td>
                            <form action="" method="POST">
                                <a href="" class="btn btn-sm btn-primary"> <i
                                        class="fa fa-eye"></i></a>
                                <a href="" class="btn btn-sm btn-info"> <i
                                        class="fa fa-edit"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>

    </table>
   </div>
</div>

@endsection