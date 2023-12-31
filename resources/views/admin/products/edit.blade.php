@extends('layouts.app')
@section('title', 'Create')
@section('content')
    <div class="container p-3">
        <div style="background-color: rgba(0, 0, 0, 0.5)" class="card p-4 shadow rounded-lg ">
            <h1 class="my-4 text-center text-light ">Modifica i dati del tuo piatto!</h1>
            {{-- action="{{ $action }}"= è un segnaposto  --}}
            <form action="{{ route('admin.products.update', $product->id) }}" class="row g-3" method="POST"
                enctype="multipart/form-data" onsubmit="return(validate())">
                @csrf()
                {{-- @method($method) = è un segnaposto --}}
                @method('PUT')

                <div class="col-12">
                    <label for="inputTitle" class="form-label  text-light">Nome piatto <span
                            class="text-danger">*</span></label>
                    {{-- value="{{ old('email'= ottenere il valore precedentemente inviato --}}
                    {{-- , $name?->email) }} = stampare il valore di email --}}
                    {{-- , $name?->email) }} = "?" se la variabile $name non è definito assegna "null"  --}}
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $product->name) }}" id="inputname" name="name">
                    <div id="error-name" class="invalid_feedback"></div>
                    @error('name')
                        <div class="invalid_feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="inputTitle" class="form-label  text-light">Immagine piatto </label>
                    <img src="{{ asset('storage/' . $product->img) }}" class="img-thumbnail" style="width: 100px; height: 100px;"
                        alt="...">
                    {{-- value="{{ old('email'= ottenere il valore precedentemente inviato --}}
                    {{-- , $name?->email) }} = stampare il valore di email --}}
                    {{-- , $name?->email) }} = "?" se la variabile $name non è definito assegna "null"  --}}
                    <input style="margin-top: 0.5rem" type="file" class="form-control @error('img') is-invalid @enderror"
                        value="{{ old('img') }}" id="inputimg" name="img" accept="image/*">
                    <div id="error-img" class="invalid_feedback"></div>
                    @error('img')
                        <div class="invalid_feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="inputTitle" class="form-label  text-light">Descrizione <span
                            class="text-danger">*</span></label>
                    {{-- value="{{ old('email'= ottenere il valore precedentemente inviato --}}
                    {{-- , $name?->email) }} = stampare il valore di email --}}
                    {{-- , $name?->email) }} = "?" se la variabile $name non è definito assegna "null"  --}}
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="inputdescription">{{ old('description', $product->description) }}</textarea>
                    <div id="error-description" class="invalid_feedback"></div>
                    @error('description')
                        <div class="invalid_feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="inputTitle" class="form-label  text-light">Prezzo <span class="text-danger">*</span></label>
                    {{-- value="{{ old('email'= ottenere il valore precedentemente inviato --}}
                    {{-- , $name?->email) }} = stampare il valore di email --}}
                    {{-- , $name?->email) }} = "?" se la variabile $name non è definito assegna "null"  --}}
                    <input step="0.01" type="number" class="form-control @error('price') is-invalid @enderror"
                        value="{{ old('price', $product->price) }}" id="inputprice" name="price">
                    <div id="error-price" class="invalid_feedback"></div>
                    @error('price')
                        <div class="invalid_feedback">{{ $message }}</div>
                    @enderror
                </div>
                <label class="form-check-label  text-light" for="flexRadioDefault2">
                    Visibile <span class="text-danger ">*</span>
                </label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="visible" id="1" value="1"
                        {{ old('visible', $product->visible) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label  text-light" for="1">
                        Si
                    </label>
                </div>
                <div class="form-check @error('visible') is-invalid @enderror">
                    <input class="form-check-input" type="radio" name="visible" id="0" value="0"
                        {{ old('visible', $product->visible) == 0 ? 'checked' : '' }}>
                    <label class="form-check-label  text-light" for="0">
                        No
                    </label>
                </div>
                <div id="error-visible" class="invalid_feedback"></div>
                @error('visible')
                    <div class="invalid_feedback">{{ $message }}</div>
                @enderror
                <div class="justify-content-center  d-flex ">

                    <button class="btn btn-primary">Aggiorna il tuo piatto</button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/products/products_edit_validation.js') }}"></script>
@endsection
