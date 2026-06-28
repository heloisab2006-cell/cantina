<div class="modal fade" id="createProdutoModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Novo Produto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="nome" class="form-control mb-2" placeholder="Nome" required>
                    <textarea name="descricao" class="form-control mb-2" placeholder="Descrição"></textarea>
                    <input type="number" step="0.01" name="preco" class="form-control mb-2" placeholder="Preço"
                        required>
                    <input type="text" name="categoria" class="form-control mb-2" placeholder="Categoria" required>
                    <input type="file" name="imagem" class="form-control mb-2" accept="image/*">
                </div>
                
                <button type="submit" class="btn btn-success btn-lg rounded">Salvar</button>
            </form>
        </div>
    </div>
</div>