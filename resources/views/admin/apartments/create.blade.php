@extends('layouts.app')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-8">

                <form action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf()
                    
                    {{-- title --}}
                    <div class="mb-3">
                      <label class="form-label">Title</label>
                      <div>
                        <input type="text" class="form-control" value="{{old('title')}}" name="title">
                      </div>
                    </div>

                    {{-- address --}}
                    <div class="mb-3">
                      <label class="form-label">Address</label>
                      <div>
                        <input type="text" class="form-control" value="{{old('adress')}}" name="adress">
                      </div>
                    </div>

                    {{-- price --}}
                    <div class="mb-3">
                      <label class="form-label">Price</label>
                      <div>
                        <input type="text" class="form-control" value="{{old('price')}}" name="price">
                      </div>
                    </div>

                    {{-- image --}}
                    <div class="mb-3">
                      <label class="form-label">Images</label>
                      <input type="file" accept="images/*" class="form-control"
                        name="images">
                    </div>

                    {{-- description --}}
                    <div class="mb-3">
                      <label class="form-label">Description</label>
                      <div>
                        <textarea class="form-control" style="height: 150px;"
                          name="description">{{old('description')}}
                        </textarea>
                      </div>
                    </div>
                    
                    {{-- rooms number --}}
                    <div class="mb-3">
                      <label class="form-label">Rooms Number</label>
                      <div>
                        <input type="text" class="form-control" value="{{old('rooms_num')}}" name="rooms_num">
                      </div>
                    </div>

                    {{-- beds number --}}
                    <div class="mb-3">
                      <label class="form-label">Beds Number</label>
                      <div>
                        <input type="text" class="form-control" value="{{old('beds_num')}}" name="beds_num">
                      </div>
                    </div>

                    {{-- bathrooms number --}}
                    <div class="mb-3">
                      <label class="form-label">Bathrooms Number</label>
                      <div>
                        <input type="text" class="form-control" value="{{old('bathroom_num')}}" name="bathroom_num">
                      </div>
                    </div>

                    {{-- visibility --}}
                    <div class="row mb-3">
                      <label class="col-3 col-form-label">Visibility</label>
                      <div class="col-sm-9 d-flex flex-row">
                        <div class="d-flex" style="width: fit-content">
                          <input type="radio" name="visibility" value="1" class="form-check-input mx-1" @if(old('visibility') == 1) checked @endif> Visibile
                        </div>
                        <div class="d-flex" style="width: fit-content">
                          <input type="radio" name="visibility" value="0" class="form-check-input mx-1" @if(old('visibility') == 0) checked @endif> Non Visibile
                        </div>
                      </div>
                    </div>

                    {{-- square meters --}}
                    <div class="mb-3">
                      <label class="form-label">Square Meters</label>
                      <div>
                        <input type="text" class="form-control" value="{{old('square_meters')}}" name="square_meters">
                      </div>
                    </div>

                    <div class="w-100 text-center">
                        <a class="btn btn-secondary" href="{{ route("admin.apartments.index") }}">Cancel</a>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection