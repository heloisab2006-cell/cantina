@foreach($setores as $setor)
<div class="modal fade" id="modalAddQuarto{{ $setor->id }}" tabindex="-1">
  <div class="modal-dialog">
    <form action="{{ route('quartos.store') }}" method="POST" class="modal-content">
      @csrf
      <input type="hidden" name="setor_id" value="{{ $setor->id }}">
      <div class="modal-header"><h5 class="modal-title">Novo Quarto em {{ $setor->numero }}</h5></div>
      <div class="modal-body">
        <input type="text" name="numero" class="form-control" placeholder="Nome do quarto" required>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button class="btn btn-success">Salvar</button>
      </div>
    </form>
  </div>
</div>
@endforeach
