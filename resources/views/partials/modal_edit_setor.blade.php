@foreach($setores as $setor)
<div class="modal fade" id="modalEditSetor{{ $setor->id }}" tabindex="-1">
  <div class="modal-dialog">
    <form action="{{ route('setores.update', $setor->id) }}" method="POST" class="modal-content">
      @csrf @method('PUT')
      <div class="modal-header"><h5 class="modal-title">Editar Setor - {{ $setor->nome }}</h5></div>
      <div class="modal-body">
        <input type="text" name="nome" class="form-control" value="{{ $setor->nome }}" required>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button class="btn btn-warning">Atualizar</button>
      </div>
    </form>
  </div>
</div>
@endforeach
