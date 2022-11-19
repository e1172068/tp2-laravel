@extends("layouts.app")
@section("content")
<div class="container">
    <div class="row justify-content-center">   
        <h1 class="pt-5">@lang("lang.dashboard_edit_title")</h1>
        <form action="{{ route('auth.update') }}" method="POST" class="py-5">
            @csrf
            @method("PUT")
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
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="adress" class="col-sm-3 col-form-label">@lang("lang.form_label_adress")</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="adress" name="adress" value="{{ $etudiant->adress }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="phone" class="col-sm-3 col-form-label">@lang("lang.form_label_phone")</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $etudiant->phone }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="birthdate" class="col-sm-3 col-form-label">@lang("lang.form_label_birthdate")</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ $etudiant->birthdate }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="ville_id" class="col-sm-3 col-form-label">@lang("lang.form_label_city")</label>
                <div class="col-sm-9">
                    <select class="form-select" id="ville_id" name="ville_id" aria-label="Default select example" required>
                        <option selected disabled>@lang("lang.city_placeholder")</option>
                        @foreach ($villes as $ville)
                            @if ($ville->id == $etudiant->ville_id)
                                    <option value="{{ $ville->id }}" selected>{{ $ville->nom }}</option>
                                @else
                                    <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-end py-2 button-container">
                <a type="button" href="{{ route('dashboard')}}" class="btn btn-secondary">@lang("lang.back")</a>
                <input type="submit"  class="btn btn-primary" value="@lang('lang.submit')"/>
            </div>
        </form>        
    </div>
</div>
@endsection