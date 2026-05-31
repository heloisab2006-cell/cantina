<!-- Modal Meus Dados -->
<div class="modal fade" id="dadosModal" tabindex="-1" aria-labelledby="dadosModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content shadow-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="dadosModalLabel">👤 Meus Dados</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form id="formModal" action="{{ route('carrinho.salvarDados') }}" method="POST">
                @csrf
                <div class="modal-body">

                    {{-- Exibe erros globais --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Nome --}}
                    <div class="mb-3">
                        <label class="form-label">Nome Completo</label>
                        <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
                            value="{{ old('nome') }}" required>
                        @error('nome')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- CPF --}}
                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" id="cpf" name="cpf"  pattern="\d{11}" class="form-control @error('cpf') is-invalid @enderror"
                            value="{{ old('cpf') }}" maxlength="11" required>
                        @error('cpf')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Setor --}}
                    <div class="mb-3">
                        <label class="form-label">Setor</label>
                        <select id="setor" name="setor" class="form-select @error('setor') is-invalid @enderror"
                            required>
                            <option value="">Selecione...</option>
                            @foreach($setores as $setor)
                                <option value="{{ $setor->id }}" {{ old('setor') == $setor->id ? 'selected' : '' }}>
                                    {{ $setor->nome }}
                                </option>
                            @endforeach
                        </select>
                        @error('setor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Quarto --}}
                    <div class="mb-3">
                        <label class="form-label">Quarto</label>
                        <select id="quarto" name="quarto" class="form-select @error('quarto') is-invalid @enderror"
                            required>
                            <option value="">Selecione o setor primeiro...</option>
                        </select>
                        @error('quarto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
    document.getElementById('setor').addEventListener('change', function () {
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

{{-- Script para reabrir modal se houver erros --}}
@if ($errors->any())
    <script>
        var dadosModal = new bootstrap.Modal(document.getElementById('dadosModal'));
        dadosModal.show();
    </script>
@endif