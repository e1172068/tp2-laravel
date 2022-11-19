@extends("layouts.app")
@section("content")
@php $locale = session()->get('locale'); @endphp
    <main>
        <div class="pt-5 d-flex justify-content-between align-items-center">
            <h1>{{__("lang.document_list_title")}}</h1>
            <a href="{{ route('document.create') }}" class="btn btn-primary">{{__("lang.document_add")}}</a>
        </div>
        <table class="py-3 table">
        <thead>
            <tr>
                <th>{{__("lang.th_title")}}</th>
                <th>{{__("lang.th_uploaded_by")}}</th>
                <th>{{__("lang.th_link")}}</th>
                <th>{{__("lang.th_action")}}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($documents as $document)
                <tr>
                    <td>{{ $locale == "en" ? $document->titre_en : $document->titre }}</td>
                    <td>{{ $document->documentHasUser->name }}</td>
                    <td>
                        <a class="btn btn-link btn-sm" target="_blank" href="{{ Storage::url($document->document_path) }}">
                            <i class="fa-solid fa-file-arrow-down"></i>
                        </a>
                    </td>
                    @if (auth()->user()->id === $document->documentHasUser->id)
                    <td class="d-flex no-wrap">
                        <a class="btn btn-link btn-sm" href="{{ route('document.edit', $document->id)}}"><i class="fa-solid fa-file-pen"></i></a>
                        <form action="{{ route('document.destroy', $document->id) }}" method="POST">
                            @csrf 
                            @method("DELETE")
                            <button type="submit" class="btn btn-link btn-sm"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                    @else
                    <td>{{__("lang.not_available")}}</td>
                    @endif
                    
                </tr>
            @empty
                <li class="text-danger">{{__("lang.document_none")}}</li>
            @endforelse 
        </tbody>
        </table>  
        <div class="d-flex justify-content-center">    
            <span>{{ $documents->links() }}</span>
        </div>
    </main>
@endsection