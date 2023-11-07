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
                        <div class="title-error d-none">
                          <span class="text-white bg-danger p-1">Inserisci il titolo</span>
                        </div>
                        @error('title')
                            <p class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $message }}</p>
                        @enderror
                        <div>
                            <input type="text" class="form-control" value="{{ old('title') }}" name="title" required>
                        </div>
                    </div>

                    {{-- address --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold fs-5">Address</label>
                        <div class="address-error d-none">
                          <span class="text-white bg-danger p-1">Inserisci l'indirizzo</span>
                        </div>
                        @error('address')
                            <p class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $message }}</p>
                        @enderror
                        <div>
                            <input type="text" class="form-control" value="{{ old('address') }}" name="address" required>
                        </div>
                    </div>

                    {{-- price --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold fs-5">Daily stay price</label>
                        <div class="price-error d-none">
                          <span class="text-white bg-danger p-1">Inserisci il prezzo</span>
                        </div>
                        @error('price')
                            <p class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $message }}</p>
                        @enderror
                        <div>
                            <input type="text" class="form-control" value="{{ old('price') }}" name="price" required>
                        </div>
                    </div>

                    {{-- image --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold fs-5">Images</label>
                        <div class="image-error d-none">
                          <span class="text-white bg-danger p-1">Inserisci almeno un'immagine</span>
                        </div>
                        @error('images')
                            <p class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $message }}</p>
                        @enderror
                        <input type="file" accept="image/*" class="form-control" name="images[]" multiple="multiple" required>
                    </div>

                    {{-- description --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold fs-5">Description</label>
                        <div class="description-error d-none">
                          <span class="text-white bg-danger p-1">Inserisci una descrizione</span>
                        </div>
                        @error('description')
                            <p class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $message }}</p>
                        @enderror
                        <div>
                            <textarea class="form-control" style="height: 150px;" name="description">{{ old('description') }}</textarea>
                        </div>
                    </div>

                    {{-- rooms number --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold fs-5">Rooms Number</label>
                        <div class="rooms-error d-none">
                          <span class="text-white bg-danger p-1">Inserisci il numero di stanze</span>
                        </div>
                        @error('rooms_num')
                            <p class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $message }}</p>
                        @enderror
                        <div>
                            <input type="text" class="form-control" value="{{ old('rooms_num') }}" name="rooms_num" required>
                        </div>
                    </div>

                    {{-- beds number --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold fs-5">Beds Number</label>
                        <div class="beds-error d-none">
                          <span class="text-white bg-danger p-1">Inserisci il numero di letti disponibili</span>
                        </div>
                        @error('beds_num')
                            <p class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $message }}</p>
                        @enderror
                        <div>
                            <input type="text" class="form-control" value="{{ old('beds_num') }}" name="beds_num" required>
                        </div>
                    </div>

                    {{-- bathrooms number --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold fs-5">Bathrooms Number</label>
                        <div class="baths-error d-none">
                          <span class="text-white bg-danger p-1">Inserisci il numero di bagni disponibili</span>
                        </div>
                        @error('bathroom_num')
                            <p class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $message }}</p>
                        @enderror
                        <div>
                            <input type="text" class="form-control" value="{{ old('bathroom_num') }}" name="bathroom_num" required>
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
                        <div class="sqMeters-error d-none">
                          <span class="text-white bg-danger p-1">Inserisci il numero di metri quadrati della struttura</span>
                        </div>
                        @error('square_meters')
                            <p class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $message }}</p>
                        @enderror
                        <div>
                            <input type="text" class="form-control" value="{{ old('square_meters') }}" name="square_meters" required />
                        </div>
                    </div>

                    {{-- amenities --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold fs-5">Amenities</label>
                        @if ($errors->has('amenity'))
                            <p class="text-danger d-block px-1 mb-2 bg-danger-subtle rounded-2 border-danger">{{ $errors->first('amenity') }}</p>
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
                            <div class="missing-amenities mt-3 d-flex justify-content-center d-none">
                                <span class="text-white bg-danger p-1">Seleziona almeno un servizio</span>
                            </div>
                        </div>
                    </div>

                    <div class="w-100 text-center">
                        <a class="btn btn-secondary" href="{{ route('admin.apartments.index') }}">Cancel</a>
                        <button class="btn btn-primary" type="button" id="save-button">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        const saveButton = document.getElementById('save-button');

        saveButton.addEventListener('click', function () {
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
        });
    </script>
@endsection
