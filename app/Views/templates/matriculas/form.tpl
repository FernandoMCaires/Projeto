{extends file="layouts/main.tpl"}

{block name="content"}

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2>Nova Matrícula</h2>
                        <a href="/matriculas" class="btn btn-secondary">Voltar</a>
                    </div>
                </div>
                <div class="card-body">
                    {if isset($error)}
                        <div class="alert alert-danger">{$error}</div>
                    {/if}

                    <form method="POST" action="/matriculas/criar">
                        <div class="mb-3">
                            <label for="aluno_id" class="form-label">Aluno</label>
                            <select class="form-select" id="aluno_id" name="aluno_id" required>
                                {foreach $alunos as $aluno}
                                    <option value="{$aluno->getId()}">{$aluno->getNome()}</option>
                                {/foreach}
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="curso_id" class="form-label">Curso</label>
                            <select class="form-select" id="curso_id" name="curso_id[]" multiple required>
                                {foreach $cursos as $curso}
                                    <option value="{$curso->getId()}">{$curso->getNome()}</option>
                                {/foreach}
                            </select>
                            <small class="text-danger">
                                Selecione pelo menos um curso, ou aperte CRTL para selecionar mais de um.
                            </small>
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
