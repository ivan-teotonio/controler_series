
<x-layout title="Séries">

@isset($mensagem)
    <div class="alert alert-success">{{ session('mensagem') }}</div>
@endisset

<a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar Série</a>

<ul class="list-group">
    @foreach($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $serie->name }}
            <form action="{{ route('series.destroy', $serie->id) }}" method="post" class="m-0">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Excluir</button>
            </form>
        </li>
    @endforeach
</ul>


</x-layout>