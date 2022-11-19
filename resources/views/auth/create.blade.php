@extends("layouts.app")
@section("content")
<div class="container">
    <div class="row justify-content-center">   
        <h1 class="pt-5">@lang("lang.registration_title")</h1>
        <form action="" method="POST" class="py-5">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session("success")}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row mb-3">
                <label for="name" class="col-sm-3 col-form-label">@lang("lang.form_label_name")</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="adress" class="col-sm-3 col-form-label">@lang("lang.form_label_adress")</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="adress" name="adress" value="{{ old('adress') }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="phone" class="col-sm-3 col-form-label">@lang("lang.form_label_phone")</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-3 col-form-label">@lang("lang.form_label_email")</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="birthdate" class="col-sm-3 col-form-label">@lang("lang.form_label_birthdate")</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ old('birthdate') }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="ville_id" class="col-sm-3 col-form-label">@lang("lang.form_label_city")</label>
                <div class="col-sm-9">
                    <select class="form-select" id="ville_id" name="ville_id" aria-label="Default select example" required>
                        <option selected disabled>@lang("lang.city_placeholder")</option>
                        @foreach ($villes as $ville)
                            @if ($ville->id == old("ville_id"))
                                    <option value="{{ $ville->id }}" selected>{{ $ville->nom }}</option>
                                @else
                                    <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-sm-3 col-form-label">@lang("lang.form_label_password")</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-sm-3 col-form-label">@lang("lang.form_label_confirm_password")</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password_confirmation" required>
                </div>
            </div>
            <div class="d-flex justify-content-end py-2 button-container">
                <a type="button" href="{{ route('etudiant.index')}}" class="btn btn-secondary">@lang("lang.back")</a>
                <input type="submit"  class="btn btn-primary" value="@lang('lang.submit')"/>
            </div>
        </form>        
    </div>
</div>
@endsection