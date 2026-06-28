<div class="modal fade" id="modalAddSetor" tabindex="-1">
  <div class="modal-dialog">
    <form action="{{ route('setores.store') }}" method="POST" class="modal-content">
      @csrf
      <div class="modal-header"><h5 class="modal-title">Novo Setor</h5></div>
      <div class="modal-body">
        <input type="text" name="nome" class="form-control" placeholder="Nome do setor" required>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button class="btn btn-primary">Salvar</button>
      </div>
    </form>
  </div>
</div>
