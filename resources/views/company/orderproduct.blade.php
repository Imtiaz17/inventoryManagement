@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Order product
                    <a class="btn btn-primary" style="float:right" href="{{ route('company.index') }}">Back</a>
                </div>
              
                <div class="card-body">
                    <form action="{{ route('product.store')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 text-right control-label col-form-label">Product</label>
                            <div class="col-md-8">
                                <input type="text" name="name" class="form-control" placeholder="Product Name">
                            </div>
                        </div>
                            <button type="submit" class="btn btn-primary float-right">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection