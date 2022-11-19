@extends("layouts.app")
@section("content")
<div class="container">
    <div class="row justify-content-center">   
        <h1 class="pt-5">{{ __("lang.forum_edit_title") }}</h1>
        <form action="" method="POST" class="py-5">
            @csrf
            @method('PUT')
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
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="fr-tab" data-bs-toggle="tab" data-bs-target="#fr" type="button" role="tab" aria-controls="fr" aria-selected="true">{{ __("lang.fr") }}</button>
                    <button class="nav-link" id="en-tab" data-bs-toggle="tab" data-bs-target="#en" type="button" role="tab" aria-controls="en" aria-selected="false">{{ __("lang.en") }}</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="fr" role="tabpanel" aria-labelledby="fr-tab">
                    <div class="row mb-3">
                        <label for="titre" class="col-sm-3 col-form-label">@lang("lang.form_label_title") (fr)</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="titre" name="titre" value="{{ $article->titre }}" novalidate>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="contenu" class="col-sm-3 col-form-label">@lang("lang.form_label_content") (fr)</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="contenu" name="contenu" novalidate>{{ $article->contenu }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="en-tab">
                <div class="row mb-3">
                    <div class="row mb-3">
                        <label for="titre_en" class="col-sm-3 col-form-label">@lang("lang.form_label_title") (en)</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="titre_en" name="titre_en" value="{{ $article->titre_en }}" novalidate>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="contenu_en" class="col-sm-3 col-form-label">@lang("lang.form_label_content") (en)</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="contenu_en" name="contenu_en" novalidate>{{ $article->contenu_en }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end py-2 button-container">
                <a type="button" href="{{ route('article.index')}}" class="btn btn-secondary">@lang("lang.back")</a>
                <input type="submit"  class="btn btn-primary" value="@lang('lang.submit')"/>
            </div>
        </form>        
    </div>
</div>
@endsection