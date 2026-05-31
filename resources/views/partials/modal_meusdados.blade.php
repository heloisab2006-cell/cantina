<!-- Modal Meus Dados -->
<div class="modal fade" id="dadosModal" tabindex="-1" aria-labelledby="dadosModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content shadow-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="dadosModalLabel">👤 Meus Dados</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('carrinho.checkout') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nome Completo</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">CPF</label>
                        <input type="text" name="cpf" class="form-control" maxlength="11" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Setor</label>
                        <select id="setor" name="setor" class="form-select" required>
                            <option value="">Selecione...</option>
                            @foreach($setores as $setor)
                                <option value="{{ $setor->id }}">{{ $setor->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Quarto</label>
                        <select id="quarto" name="quarto" class="form-select" required>
                            <option value="">Selecione o setor primeiro...</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Salvar Dados</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Script para atualizar os quartos -->
<script>
document.getElementById('setor').addEventListener('change', function() {
    let setorId = this.value;
    let quartosSelect = document.getElementById('quarto');
    quartosSelect.innerHTML = '<option value="">Carregando...</option>';

    fetch('/api/quartos/' + setorId)
        .then(response => response.json())
        .then(data => {
            quartosSelect.innerHTML = '<option value="">Selecione...</option>';
            data.forEach(quarto => {
                quartosSelect.innerHTML += `<option value="${quarto.id}">${quarto.numero}</option>`;
            });
        });
});
</script>
