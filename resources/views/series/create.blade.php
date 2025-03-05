
<x-layout title="Nova Série">

<!-- crie um formulario com u input chamado serie -->
<form method="post" action="{{ route('series.store') }}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nome da Série:</label>
        <input class="form-control" type="text" name="name" id="name">
    </div>
    <button class="btn btn-primary">Adicionar</button>
</form>

</x-layout>