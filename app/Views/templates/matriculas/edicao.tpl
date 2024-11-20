{extends file="layouts/main.tpl"}

{block name="content"}

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2>Editar Matrícula</h2>
                        <a href="/matriculas" class="btn btn-secondary">Voltar</a>
                    </div>
                </div>
                <div class="card-body">
                    {if isset($error)}
                        <div class="alert alert-danger">{$error}</div>
                    {/if}

                    <form method="POST" action="/matriculas/update/{$matricula->getId()}">
                        <div class="mb-3">
                            <label for="aluno_id" class="form-label">Aluno</label>
                            <select class="form-select" id="aluno_id" name="aluno_id" required disabled>
                                <option value="{$matricula->getAluno()->getId()}" selected>
                                    {$matricula->getAluno()->getNome()}
                                </option>
                            </select>
                            <input type="hidden" name="aluno_id" value="{$matricula->getAluno()->getId()}">
                        </div>
                        
                        <div class="mb-3">
                            <label for="curso_id" class="form-label">Curso</label>
                            <input type="text" class="form-control" id="curso_id" value="{$curso->getNome()}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="Ativa" 
                                    {if $matricula->getStatus() == 'Ativa'}selected{/if}
                                    {if !$curso->isAtivo()}disabled{/if}>
                                    Ativa
                                </option>
                                <option value="Cancelada" 
                                    {if $matricula->getStatus() == 'Cancelada'}selected{/if}>
                                    Cancelada
                                </option>
                            </select>
                            {if !$curso->isAtivo()}
                                <small class="text-danger">
                                    Este curso está inativo. Não é possível ativar a matrícula.
                                </small>
                            {/if}
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="/matriculas" class="btn btn-secondary">Voltar</a>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{/block}