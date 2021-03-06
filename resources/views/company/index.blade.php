@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Product Recieved
                    <a class="btn btn-primary" style="float:right" href="{{ route('pending') }}">Pedning product</a>
                    <a class="btn btn-primary" style="float:right" href="{{ route('product.create') }}">Order product</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="name">Product Name</th>
                            <th scope="date">Recieved date</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            @forelse($products as $product)
                          <tr>
                            <th scope="col">{{ $count++ }}</th>
                            <th scope="name">{{$product->name}}</th>
                            <td scope="date">{{date('d-m-Y', strtotime($product->created_at))}}</td>
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