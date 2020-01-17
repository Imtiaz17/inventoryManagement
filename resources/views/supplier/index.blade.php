@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Order product
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="name">Product Name</th>
                            <th scope="date">Order date</th>
                            <th scope="action">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            @forelse($products as $product)
                          <tr>
                            <th scope="row">{{ $count++ }}</th>
                            <th scope="name">{{$product->name}}</th>
                            <td scope="date">{{date('d-m-Y', strtotime($product->order_date))}}</td>
                            <th scope="action"> 
                              <form action="{{route('supplyproduct',$product->id)}}" id="supply-form-{{ $product->id }}"
                                method="post" style="display: none;">
                              {{ csrf_field() }}
                              {{ method_field('PATCH') }}
                          </form>
                          <button onclick="if(confirm('Are you Sure, You went to supply this?')){
                            event.preventDefault();
                            document.getElementById('supply-form-{{ $product->id }}').submit();
                            }else{
                            event.preventDefault();
                            }" class="btn btn-raised btn-danger btn-sm">Supply</button>
                            </th>
                             
                          </tr>
                          @empty
                          <tr>
                              <td>No supply product</td>
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