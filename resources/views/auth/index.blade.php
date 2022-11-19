@extends("layouts.app")
@section("content")
<div class="container">
    <div class="row justify-content-center">   
        <h1 class="pt-5">@lang("lang.login_title")</h1>
        <form action="{{ route('login.authentication') }}" method="POST" class="py-5">
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
                <label for="email" class="col-sm-3 col-form-label">@lang("lang.form_label_email")</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-sm-3 col-form-label">@lang("lang.form_label_password")</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password" required>
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