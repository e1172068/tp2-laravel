@extends("layouts.app")
@section("content")
    <div class="row">
        <h1 class="pt-5">{{ __("lang.student_detail") }}</h2>
        <dl>
            <dt>{{ __("lang.form_label_name") }}</dt>
            <dd>{{ $etudiant->etudiantHasUser->name }}</dd>
            <dt>{{ __("lang.form_label_adress") }}</dt>
            <dd>{{ $etudiant->adresse }}</dd>
            <dt>{{ __("lang.form_label_phone") }}</dt>
            <dd>{{ $etudiant->phone }}</dd>
            <dt>{{ __("lang.form_label_email") }}</dt>
            <dd>{{ $etudiant->etudiantHasUser->email }}</dd>
            <dt>{{ __("lang.form_label_birthdate") }}</dt>
            <dd>{{ $etudiant->birthdate }}</dd>
            <dt>{{ __("lang.form_label_city") }}</dt>
            <dd>{{ $nomVille }}</dd>
        </dl>
    </div>
    @if ($currentUserId == $etudiant->user_id)
        <a href="{{ route('auth.edit')}}" class="btn btn-primary">{{ __("lang.edit")}}</a>
        <a href="{{ route('auth.destroy')}}" class="btn btn-danger">{{ __("lang.delete")}}</a>
    @endif
@endsection