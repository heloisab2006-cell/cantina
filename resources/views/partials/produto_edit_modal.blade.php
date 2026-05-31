<div class="modal fade" id="editProdutoModal{{ $produto->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('produtos.update', $produto->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Editar Produto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="nome" class="form-control mb-2" value="{{ $produto->nome }}" required>
                    <textarea name="descricao" class="form-control mb-2">{{ $produto->descricao }}</textarea>
                    <input type="number" step="0.01" name="preco" class="form-control mb-2"
                        value="{{ $produto->preco }}" required>
                    <input type="text" name="categoria" class="form-control mb-2" value="{{ $produto->categoria }}"
                        required>
                </div>
                <input type="file" name="imagem" class="form-control mb-2" accept="image/*">
                @if($produto->imagem)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}" class="rounded"
                            style="width:70px;height:70px;object-fit:cover;">
                    </div>
                @endif

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-lg rounded">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>