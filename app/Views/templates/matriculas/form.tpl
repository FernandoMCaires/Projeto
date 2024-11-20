{extends file="layouts/main.tpl"}

{block name="content"}
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2>{if isset($matricula)}Editar{else}Nova{/if} Matrícula</h2>
                        <a href="/matriculas" class="btn btn-secondary">Voltar</a>
                    </div>
                </div>
                <div class="card-body">
                    {if isset($error)}
                        <div class="alert alert-danger">{$error}</div>
                    {/if}

                    <form method="POST" action="{if isset($matricula)}/matriculas/update/{$matricula->getId()}{else}/matriculas/criar{/if}">
                        <div class="mb-3">
                            <label for="aluno_id" class="form-label">Aluno</label>
                            <select class="form-select" id="aluno_id" name="aluno_id" required>
                                <option value="">Selecione um aluno</option>
                                {foreach $alunos as $aluno}
                                    <option value="{$aluno->getId()}" 
                                        {if isset($matricula) && $matricula->getAluno()->getId() == $aluno->getId()}selected{/if}>
                                        {$aluno->getNome()}
                                    </option>
                                {/foreach}
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="curso_id" class="form-label">Curso</label>
                            <select class="form-select" id="curso_id" name="curso_id" required>
                                {foreach $cursos as $curso}
                                    <option value="{$curso->getId()}"
                                        {if isset($matricula) && $matricula->getCurso()->getId() == $curso->getId()}selected{/if}>
                                        {$curso->getNome()}
                                    </option>
                                {/foreach}
                            </select>
                        </div>

                        {if isset($matricula)}
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="Ativa" 
                                        {if $matricula->getStatus() == 'Ativa'}selected{/if}
                                        {if !$matricula->getCurso()->isAtivo()}disabled{/if}>
                                        Ativa
                                    </option>
                                    <option value="Cancelada" 
                                        {if $matricula->getStatus() == 'Cancelada'}selected{/if}>
                                        Cancelada
                                    </option>
                                </select>
                                {if !$matricula->getCurso()->isAtivo()}
                                    <small class="text-danger">
                                        Este curso está inativo. Não é possível ativar a matrícula.
                                    </small>
                                {/if}
                            </div>
                        {/if}

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
