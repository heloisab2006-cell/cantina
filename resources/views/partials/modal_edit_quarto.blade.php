@foreach($setores as $setor)
  @foreach($setor->quartos as $quarto)
  <div class="modal fade" id="modalEditQuarto{{ $quarto->id }}" tabindex="-1">
    <div class="modal-dialog">
      <form action="{{ route('quartos.update', $quarto->id) }}" method="POST" class="modal-content">
        @csrf @method('PUT')
        <div class="modal-header"><h5 class="modal-title">Editar Quarto - {{ $quarto->numero }}</h5></div>
        <div class="modal-body">
          <input type="text" name="numero" class="form-control" value="{{ $quarto->numero }}" required>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button class="btn btn-warning">Atualizar</button>
        </div>
      </form>
    </div>
  </div>
  @endforeach
@endforeach
