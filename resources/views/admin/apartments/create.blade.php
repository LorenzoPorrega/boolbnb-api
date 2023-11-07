@extends('layouts.app')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <form action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data" id="myForm">
                    @csrf

                    {{-- title --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold fs-5">Title</label>
                        <small class="text-white title-error d-none bg-danger p-1 rounded-2">Fill this field</small>
                        {{-- @error('title')
                            <p class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $message }}</p>
                        @enderror --}}
                        <div>
                            <input type="text" class="form-control" value="{{ old('title') }}" id="title" name="title" required
                            oninput="validateInputs('title', 'title-error')">
                        </div>
                    </div>

                    {{-- address --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold fs-5">Address</label>
                        <small class="text-white address-error d-none bg-danger p-1 rounded-2">Fill this field</small>
                        {{-- @error('address')
                            <p class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $message }}</p>
                        @enderror --}}
                        <div id="input">
                            <input type="text" class="form-control d-none" value="{{ old('address') }}" id="address" name="address" required>
                        </div>
                    </div>

                    {{-- price --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold fs-5">Daily stay price</label>
                        <small class="text-white price-error d-none bg-danger p-1 rounded-2">Fill this field</small>
                        {{-- @error('price')
                            <p class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $message }}</p>
                        @enderror --}}
                        <div>
                            <input type="text" class="form-control" value="{{ old('price') }}" id="price" name="price" required
                            oninput="validateInputs('price', 'price-error')">
                        </div>
                    </div>

                    {{-- image --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold fs-5">Images</label>
                        <small class="text-white image-error d-none bg-danger p-1 rounded-2">Fill this field</small>
                        @error('images')
                            <p class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $message }}</p>
                        @enderror
                        <input type="file" accept="image/*" class="form-control" id="images" name="images[]" multiple="multiple" required
                        oninput="validateInputs('images', 'image-error')">
                    </div>

                    {{-- description --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold fs-5">Description</label>
                        <small class="text-white description-error d-none bg-danger p-1 rounded-2">Fill this field</small>
                        {{-- @error('description')
                            <p class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $message }}</p>
                        @enderror --}}
                        <div>
                          <textarea class="form-control" style="height: 150px;" id="description" name="description" required
                          oninput="validateInputs('description', 'description-error')">{{ old('description') }}</textarea>
                        </div>
                    </div>

                    {{-- rooms number --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold fs-5">Rooms Number</label>
                        <small class="text-white rooms-error d-none bg-danger p-1 rounded-2">Fill this field</small>
                        @error('rooms_num')
                            <p class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $message }}</p>
                        @enderror
                        <div>
                            <input type="text" class="form-control" value="{{ old('rooms_num') }}" id="rooms_num" name="rooms_num" required
                            oninput="validateInputs('rooms_num', 'rooms-error')">
                        </div>
                    </div>

                    {{-- beds number --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold fs-5">Beds Number</label>
                        <small class="text-white beds-error d-none bg-danger p-1 rounded-2">Fill this field</small>
                        @error('beds_num')
                            <p class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $message }}</p>
                        @enderror
                        <div>
                            <input type="text" class="form-control" value="{{ old('beds_num') }}" id="beds_num" name="beds_num" required
                            oninput="validateInputs('beds_num', 'beds-error')">
                        </div>
                    </div>

                    {{-- bathrooms number --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold fs-5">Bathrooms Number</label>
                        <small class="text-white baths-error d-none bg-danger p-1 rounded-2">Fill this field</small>
                        @error('bathroom_num')
                            <p class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $message }}</p>
                        @enderror
                        <div>
                            <input type="text" class="form-control" value="{{ old('bathroom_num') }}" id="bathroom_num" name="bathroom_num" required
                            oninput="validateInputs('bathroom_num', 'baths-error')">
                        </div>
                    </div>

                    {{-- visibility --}}
                    <div class="row mb-3">
                        <label class="col-3 col-form-label fw-bold fs-5">Visibility</label>
                        <div class="row w-100">
                            <div>
                                <input type="radio" name="visibility" value="1" class="form-check-input mx-1" @if (old('visibility') == 1) checked @endif>Already visible
                            </div>
                            <div>
                                <input type="radio" name="visibility" value="0" class="form-check-input mx-1" @if (old('visibility') == 0) checked @endif>Hidden for now
                            </div>
                        </div>
                    </div>

                    {{-- square meters --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold fs-5">Square Meters</label>
                        <small class="text-white sqMeters-error d-none bg-danger p-1 rounded-2">Fill this field</small>
                        @error('square_meters')
                            <p class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $message }}</p>
                        @enderror
                        <div>
                            <input type="text" class="form-control" value="{{ old('square_meters') }}" id="square_meters" name="square_meters" required
                            oninput="validateInputs('square_meters', 'sqMeters-error')"/>
                        </div>
                    </div>

                    {{-- amenities --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold fs-5">Amenities</label>
                        @if ($errors->has('amenity'))
                          {{-- <small class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $errors->first('amenity') }}</small> --}}
                          <small class="text-white bg-danger p-1 rounded-2">Select at least one amenity.</small>
                        @endif
                        <div class="row d-flex">
                            @php $counter = 1; @endphp
                            @foreach ($data as $singleCategory)
                                <div class="col-12 col-xs-6 col-sm-6 col-lg-4">
                                    <div class="accordion mb-2" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="{{ '#collapse' . $counter }}" aria-expanded="false" aria-controls="{{ 'collapse' . $counter }}">
                                                    {{ $singleCategory['category'] }}
                                                </button>
                                            </h2>
                                            <div id="{{ 'collapse' . $counter }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                <div class="accordion-body d-flex flex-column">
                                                    @foreach ($amenitiesServices as $singleAmenity)
                                                        @if ($singleAmenity->category == $singleCategory['category'])
                                                            <div>
                                                                <input class="form-check-input" type="checkbox" value="{{ $singleAmenity->id }}" id="flexCheckDefault{{ $singleAmenity->id }}" name="amenity[]">
                                                                <label class="form-check-label" for="flexCheckDefault{{ $singleAmenity->id }}">
                                                                    {{ $singleAmenity->name }}
                                                                </label>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php $counter++; @endphp
                            @endforeach
                        </div> 
                    </div>

                    <div class="w-100 text-center">
                        <a class="btn btn-secondary" href="{{ route('admin.apartments.index') }}">Cancel</a>
                        <button class="btn btn-primary" type="submit" id="save-button"
                        onsubmit="">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        /* const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        const saveButton = document.getElementById('save-button'); */
        

        function validateInputs(id, errorSpan) {
          const input = document.getElementById(id);
          console.log(id);
          let errorSpanElement = document.querySelector(`.${errorSpan}`);
          if (!input.value) {
              if (errorSpanElement) {
                  input.classList.add("bg-danger-subtle")
                  errorSpanElement.classList.replace("d-none", "d-inline");
              }
          } else {
              if (errorSpanElement) {
                input.classList.remove("bg-danger-subtle")
                  errorSpanElement.classList.replace("d-inline", "d-none");
              }
          }
        }

        /* saveButton.addEventListener('click', function () {
            const selectedCheckboxes = document.querySelectorAll('input[type="checkbox"]:checked');
            const validateTitle = document.querySelector('input[name="title"]')
            
            const validateAddress = document.querySelector('input[name="address"]')
            const validatePrice = document.querySelector('input[name="price"]')
            const validateImage = document.querySelector('input[name="images[]"]')
            const validateDescription = document.querySelector('input[name="description"]')
            const validateRooms = document.querySelector('input[name="rooms_num"]')
            const validateBeds = document.querySelector('input[name="beds_num"]')
            const validateBaths = document.querySelector('input[name="bathroom_num"]')
            const validateSqMeters = document.querySelector('input[name="square_meters"]')
            

            if (!validateTitle.value){
              const titleError = document.querySelector(".title-error")
              titleError.classList.replace('d-none','d-block')              
            } else if (!validateAddress.value){
              const addressError = document.querySelector(".address-error")
              titleError.classList.replace('d-none','d-block')   
            } else if (!validatePrice.value){
              const priceError = document.querySelector(".price-error")
              priceError.classList.replace('d-none','d-block')   
            } else if (!validateImage.value){
              const imageError = document.querySelector(".image-error")
              imageError.classList.replace('d-none','d-block')   
            } else if (!validateDescription.value){
              const descriptionError = document.querySelector(".description-error")
              descriptionError.classList.replace('d-none','d-block')   
            } else if (!validateRooms.value){
              const roomsError = document.querySelector(".rooms-error")
              roomsError.classList.replace('d-none','d-block')   
            } else if (!validateBeds.value){
              const bedsError = document.querySelector(".beds-error")
              bedsError.classList.replace('d-none','d-block')   
            } else if (!validateBaths.value){
              const bathsError = document.querySelector(".baths-error")
              bathsError.classList.replace('d-none','d-block')   
            } else if (!validateSqMeters.value){
              const sqMetersError = document.querySelector(".sqMeters-error")
              sqMetersError.classList.replace('d-none','d-block')   
            } else {
              document.getElementById('myForm').submit();
            }
            // if (selectedCheckboxes.length === 0) {
            //     const errorText = document.querySelector('.missing-amenities');
            //     errorText.classList.replace('d-none', 'd-block');
            // } else {
            //     const existingErrorText = document.querySelector('.missing-amenities');
            //     if (existingErrorText) {
            //         existingErrorText.remove();
            //     }
            //     document.getElementById('myForm').submit();
            // }
        }); */
    </script>
@endsection
