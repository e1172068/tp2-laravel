@extends("layouts.app")
@section("content")
    <div class="row">
        <h1 class="pt-5">{{ __("lang.dashboard_title") }} ({{ auth()->user()->name }})</h2>
        <dl>
            <dt>@lang("lang.form_label_name")</dt>
            <dd>{{ $user->name }}</dd>
            <dt>@lang("lang.form_label_adress")</dt>
            <dd>{{ $etudiant->adress }}</dd>
            <dt>@lang("lang.form_label_phone")</dt>
            <dd>{{ $etudiant->phone }}</dd>
            <dt>@lang("lang.form_label_email")</dt>
            <dd>{{ $user->email }}</dd>
            <dt>@lang("lang.form_label_birthdate")</dt>
            <dd>{{ $etudiant->birthdate }}</dd>
            <dt>@lang("lang.form_label_city")</dt>
            <dd>{{ $nomVille }}</dd>
        </dl>
    </div>
    @if ($currentUserId == $etudiant->user_id)
        <a href="{{ route('auth.edit')}}" class="btn btn-primary">@lang("lang.edit")</a>
        <a href="{{ route('auth.destroy')}}" class="btn btn-danger">@lang("lang.delete")</a>
    @endif
@endsection