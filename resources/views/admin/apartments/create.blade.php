@extends('layouts.app')
@section('content')
    
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-8">

                <form action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf()

                    {{-- title --}}
                    <div class="mb-3">
                      <label class="form-label fw-bold fs-5">Title</label>
                      @error('title')
                        <p class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $message }}</p>
                      @enderror
                      <div>
                        <input type="text" class="form-control" value="{{old('title')}}" name="title">
                      </div>
                    </div>

                    {{-- address --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold fs-5">Address</label>
                        @error('title')
                          <p class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $message }}</p>
                        @enderror
                        <div id="input">
                            <input type="text" class="form-control" value="{{ old('address') }}"  name="address" id="address" style="display: none;">
                        </div>
                    </div>

                    {{-- price --}}
                    <div class="mb-3">
                      <label class="form-label fw-bold fs-5">Daily stay price</label>
                      @error('price')
                        <p class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $message }}</p>
                      @enderror
                      <div>
                        <input type="text" class="form-control" value="{{old('price')}}" name="price">
                      </div>
                    </div>

                    {{-- image --}}
                    <div class="mb-3">
                      <label class="form-label fw-bold fs-5">Images</label>
                      @error('images')
                        <p class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $message }}</p>
                      @enderror
                      <input type="file" accept="images/*" class="form-control" name="images[]" multiple="multiple">
                    </div>

                    {{-- description --}}
                    <div class="mb-3">
                      <label class="form-label fw-bold fs-5">Description</label>
                      @error('description')
                        <p class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $message }}</p>
                      @enderror
                      <div>
                        <textarea class="form-control" style="height: 150px;" name="description">{{old('description')}}</textarea>
                      </div>
                    </div>

                    {{-- rooms number --}}
                    <div class="mb-3">
                      <label class="form-label fw-bold fs-5">Rooms Number</label>
                      @error('rooms_num')
                        <p class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $message }}</p>
                      @enderror
                      <div>
                        <input type="text" class="form-control" value="{{old('rooms_num')}}" name="rooms_num">
                      </div>
                    </div>

                    {{-- beds number --}}
                    <div class="mb-3">
                      <label class="form-label fw-bold fs-5">Beds Number</label>
                      @error('beds_num')
                        <p class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $message }}</p>
                      @enderror
                      <div>
                        <input type="text" class="form-control" value="{{old('beds_num')}}" name="beds_num">
                      </div>
                    </div>

                    {{-- bathrooms number --}}
                    <div class="mb-3">
                      <label class="form-label fw-bold fs-5">Bathrooms Number</label>
                      @error('bathroom_num')
                        <p class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $message }}</p>
                      @enderror
                      <div>
                        <input type="text" class="form-control" value="{{old('bathroom_num')}}" name="bathroom_num">
                      </div>
                    </div>

                    {{-- visibility --}}
                    <div class="row mb-3">
                      <label class="col-3 col-form-label fw-bold fs-5">Visibility</label>
                      <div class="row w-100">
                        <div>
                          <input type="radio" name="visibility" value="1" class="form-check-input mx-1" @if(old('visibility') == 1) checked @endif>Already visible
                        </div>
                        <div>
                          <input type="radio" name="visibility" value="0" class="form-check-input mx-1" @if(old('visibility') == 0) checked @endif>Hidden for now
                        </div>
                      </div>
                    </div>

                    {{-- square meters --}}
                    <div class="mb-3">
                      <label class="form-label fw-bold fs-5">Square Meters</label>
                      @error('square_meters')
                        <p class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $message }}</p>
                      @enderror
                      <div>
                        <input type="text" class="form-control" value="{{old('square_meters')}}" name="square_meters">
                      </div>
                    </div>

                    {{-- amenities --}}
                    <div class="mb-3">
                      <label class="form-label fw-bold fs-5">Amenities</label>
                      @if ($errors->has('amenity'))
                        <p class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $errors->first('amenity') }}</p>
                      @endif
                      <div class="row d-flex">
                        @php
                          $counter = 1;
                        @endphp
                        @foreach ($data as $singleCategory)
                          <div class="col-12 col-xs-6 col-sm-6 col-lg-4">
                            <div class="accordion mb-2" id="accordionExample">
                              <div class="accordion-item">
                                <h2 class="accordion-header">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="{{"#collapse" . $counter}}" aria-expanded="false" aria-controls=`{{"collapse" . $counter}}`>
                                    {{ $singleCategory["category"] }}
                                  </button>
                                </h2>
                                <div id="{{"collapse" . $counter}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                  <div class="accordion-body d-flex flex-column">
                                    @foreach ($amenitiesServices as $singleAmenity)
                                    @if($singleAmenity->category == $singleCategory["category"])
                                    <div>
                                      <input class="form-check-input" type="checkbox" value="{{$singleAmenity->id}}" id="flexCheckDefault" name="amenity[]">
                                      <span class="form-check-label" for="flexCheckDefault">
                                        {{ $singleAmenity->name }}
                                      </span>
                                    </div>
                                    @endif
                                    @endforeach
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          @php
                            $counter++;
                          @endphp
                        @endforeach
                      </div>
                    </div>

                    <div class="w-100 text-center">
                        <a class="btn btn-secondary" href="{{ route('admin.apartments.index') }}">Cancel</a>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
