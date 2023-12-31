@extends('layouts.app')
@section('title', 'Create')
@section('content')

    <div class="container p-3">
        <div style="background-color: rgba(0, 0, 0, 0.5)" class="card p-4 shadow rounded-lg ">
            <h1 class="my-4 text-center text-light">Inserisci i dati per registrare il tuo ristorante!</h1>
            {{-- action="{{ $action }}"= è un segnaposto  --}}
            <form action="{{ route('admin.restaurants.store') }}" class="row g-3" method="POST" enctype="multipart/form-data"
                onsubmit="return(validate())">
                @csrf()
                {{-- @method($method) = è un segnaposto --}}
                @method('POST')

                <div class="col-12">
                    <label for="inputTitle" class="form-label text-light ">Email <span class="text-danger">*</span></label>
                    {{-- value="{{ old('email'= ottenere il valore precedentemente inviato --}}
                    {{-- , $name?->email) }} = stampare il valore di email --}}
                    {{-- , $name?->email) }} = "?" se la variabile $name non è definito assegna "null"  --}}
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" id="inputemail" name="email">
                    <div id="error-email" class="invalid_feedback"></div>
                    @error('email')
                        <div class="invalid_feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="inputTitle" class="form-label text-light">Numero di telefono <span
                            class="text-danger">*</span></label>
                    {{-- value="{{ old('email'= ottenere il valore precedentemente inviato --}}
                    {{-- , $name?->email) }} = stampare il valore di email --}}
                    {{-- , $name?->email) }} = "?" se la variabile $name non è definito assegna "null"  --}}
                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                        value="{{ old('phone') }}" id="inputphone" name="phone">
                    <div id="error-phone" class="invalid_feedback"></div>
                    @error('phone')
                        <div class="invalid_feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="inputTitle" class="form-label text-light">Nome dell'attività <span
                            class="text-danger">*</span></label>
                    {{-- value="{{ old('email'= ottenere il valore precedentemente inviato --}}
                    {{-- , $name?->email) }} = stampare il valore di email --}}
                    {{-- , $name?->email) }} = "?" se la variabile $name non è definito assegna "null"  --}}
                    <input type="text" class="form-control @error('activity_name') is-invalid @enderror"
                        value="{{ old('activity_name') }}" id="inputactivity_name" name="activity_name">
                    <div id="error-activityname" class="invalid_feedback"></div>
                    @error('activity_name')
                        <div class="invalid_feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="inputTitle" class="form-label text-light">Immagine Ristorante <span
                            class="text-danger">*</span></label>
                    {{-- value="{{ old('email'= ottenere il valore precedentemente inviato --}}
                    {{-- , $name?->email) }} = stampare il valore di email --}}
                    {{-- , $name?->email) }} = "?" se la variabile $name non è definito assegna "null"  --}}
                    <input type="file" class="form-control @error('img') is-invalid @enderror"
                        value="{{ old('img') }}" id="inputimg" name="img" accept="image/*">
                    <div id="error-img" class="invalid_feedback"></div>
                    @error('img')
                        <div class="invalid_feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="inputTitle" class="form-label text-light">Indirizzo <span
                            class="text-danger">*</span></label>
                    {{-- value="{{ old('email'= ottenere il valore precedentemente inviato --}}
                    {{-- , $name?->email) }} = stampare il valore di email --}}
                    {{-- , $name?->email) }} = "?" se la variabile $name non è definito assegna "null"  --}}
                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                        value="{{ old('address') }}" id="inputaddress" name="address"
                        placeholder="Esempio: Via Brombeis n°23">
                    <div id="error-address" class="invalid_feedback"></div>
                    @error('address')
                        <div class="invalid_feedback">{{ $message }}</div>
                    @enderror
                </div>
                <label for="inputTitle" class="form-label text-light">Tipologia <span class="text-danger">*</span></label>
                <div class="d-flex gap-3">
                    @foreach ($types as $type)
                        <div class="form-check form-switch  @error('types') is-invalid @enderror">
                            <input class="form-check-input type-checkbox" type="checkbox" name="types[]" role="switch"
                                id="{{ $type->id }}" value="{{ $type->id }}">
                            <label class="form-check-label text-light"
                                for="{{ $type->id }}">{{ $type->name }}</label>
                        </div>
                    @endforeach
                </div>
                <div id="error-type" class="invalid_feedback"></div>
                @error('types')
                    <div class="invalid_feedback">{{ $message }}</div>
                @enderror
                <div class="d-flex justify-content-center">

                    <button class="btn btn-primary" type="submit">Crea il tuo ristorante</button>
                </div>
            </form>
        </div>

    </div>

    <script src="{{ asset('js/restaurants/restaurants_validation.js') }}"></script>
@endsection
