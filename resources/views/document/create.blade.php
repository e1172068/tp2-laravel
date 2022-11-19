@extends("layouts.app")
@section("content")
<div class="container">
    <div class="row justify-content-center">   
        <h1 class="pt-5">{{__("lang.document_add")}}</h1>
        <form action="" method="POST" class="py-5" enctype="multipart/form-data">
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
                <label for="titre" class="col-sm-3 col-form-label">@lang("lang.form_label_title") (fr)</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre') }}" novalidate>
                </div>
            </div>
            <div class="row mb-3">
                <label for="titre_en" class="col-sm-3 col-form-label">@lang("lang.form_label_title") (en)</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="titre_en" name="titre_en" value="{{ old('titre_en') }}" novalidate>
                </div>
            </div>
            <div class="row mb-3">
                <label for="document" class="col-sm-3 col-form-label">{{__("lang.form_label_file")}}</label>
                <div class="col-sm-9">
                    <input type="file" class="form-control" id="document" name="document" value="{{ old('file') }}" required accept=".pdf,.doc,.zip">
                </div>
            </div>
            <div class="d-flex justify-content-end py-2 button-container">
                <a type="button" href="{{ route('document.index')}}" class="btn btn-secondary">@lang("lang.back")</a>
                <input type="submit"  class="btn btn-primary" value="@lang('lang.submit')"/>
            </div>
        </form>        
    </div>
</div>
@endsection