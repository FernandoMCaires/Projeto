{extends file="layouts/main.tpl"}
{block name="content"}
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2>{if isset($curso)}Editar{else}Novo{/if} Curso</h2>
                        <a href="/cursos" class="btn btn-secondary">Voltar</a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{if isset($curso)}/cursos/update/{$curso->getId()}{else}/cursos/criar{/if}">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome do Curso</label>
                            <input type="text" 
                                   class="form-control" 
                                   id="nome" 
                                   name="nome" 
                                   value="{if isset($curso)}{$curso->getNome()}{/if}"
                                   required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição</label>
                            <textarea class="form-control" 
                                      id="descricao" 
                                      name="descricao" 
                                      rows="3" 
                                      required>{if isset($curso)}{$curso->getDescricao()}{/if}</textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="/cursos" class="btn btn-secondary">Voltar</a>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{/block}