@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Futsal') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('postAddFutsal') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="futsal_name" class="col-md-4 col-form-label text-md-end">Futsal Name</label>

                                <div class="col-md-6">
                                    <input id="futsal_name" type="text"
                                        class="form-control @error('futsal_name') is-invalid @enderror" name="futsal_name"
                                        value="{{ old('futsal_name') }}" required autocomplete="email" autofocus>

                                    @error('futsal_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="location"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Location') }}</label>

                                <div class="col-md-6">
                                    <textarea id="location" class="form-control @error('location') is-invalid @enderror" name="location"></textarea>

                                    @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Photo" class="col-md-4 col-form-label text-md-end">Photo</label>

                                <div class="col-md-6">
                                    <input id="photo" type="file"
                                        class="form-control @error('photo') is-invalid @enderror" name="photo" require>

                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="futsal_id"
                                    class="col-md-4 col-form-label text-md-end">{{ __('futsal_id') }}</label>

                                <div class="col-md-6">
                                    <div class="col-md-6">
                                        <textarea id="futsal_id" class="form-control @error('futsal_id') is-invalid @enderror" name="futsal_id"></textarea>


                                        @error('futsal_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="price_per_hour"
                                        class="col-md-4 col-form-label text-md-end">{{ __('price_per_hour') }}</label>

                                    <div class="col-md-6">
                                        <input id="price_per_hour"
                                            class="form-control @error('price_per_hour') is-invalid @enderror"
                                            name="price_per_hour"></input>

                                        @error('price_per_hour')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>




                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <input type="submit" class="btn btn-primary" value="Add">
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
