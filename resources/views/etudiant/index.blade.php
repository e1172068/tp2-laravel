@extends("layouts.app")
@section("content")
    <main>
        <div class="d-flex justify-content-between align-items-center pt-5">
            <h1 class="pt-5">@lang("lang.student_list_title")</h1>
        </div>
        <ul class="py-3">
        @forelse($etudiants as $etudiant)
            <li> <a href="{{ route('etudiant.show', $etudiant->user_id)}}">{{ $etudiant->etudiantHasUser->name }}</a></li>
        @empty
            <li class="text-danger">Aucun étudiant</li>
        @endforelse 
        </ul>  
        <div class="d-flex justify-content-center">    
            <span>{{ $etudiants->links() }}</span>
        </div>
    </main>
@endsection