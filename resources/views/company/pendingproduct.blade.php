@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Pending Product
                    <a class="btn btn-primary" style="float:right" href="{{ route('company.index') }}">Back</a>
                    {{-- <a class="btn btn-primary" style="float:right" href="{{ route('orderproduct') }}">Supplier product</a> --}}
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="name">Product Name</th>
                            <th scope="date">Order date</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            @forelse($products as $product)
                          <tr>
                            <th scope="col">{{ $count++ }}</th>
                            <th scope="name">{{$product->name}}</th>
                            <td scope="date">{{date('d-m-Y', strtotime($product->order_date))}}</td>
                          </tr>
                          @empty
                          <tr>
                              <td>No recieved product</td>
                          </tr>
                           @endforelse
                          
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection