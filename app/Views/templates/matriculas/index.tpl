{extends file="layouts/main.tpl"}
{block name="content"}
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="/dashboard" class="btn btn-secondary"> Voltar </a>
        <h1>Matrículas</h1>
        <a href="/matriculas/novo" class="btn btn-primary">Nova Matrícula</a>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="/matriculas" class="row g-3">
                <div class="col-md-4">
                    <input type="text" 
                           class="form-control" 
                           name="search" 
                           placeholder="Buscar por aluno ou curso..."
                           value="{$search|default:''}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-secondary w-100">Buscar</button>
                </div>
                {if isset($search) && $search != ''}
                    <div class="col-md-2">
                        <a href="/matriculas" class="btn btn-outline-secondary w-100">Limpar</a>
                    </div>
                {/if}
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Aluno</th>
                        <th>Curso</th>
                        <th>Status do Curso</th>
                        <th>Status da Matrícula</th>
                        <th width="200">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    {if $matriculas}
                        {foreach $matriculas as $matricula}
                            <tr>
                                <td>{$matricula->getId()}</td>
                                <td>
                                    {if $matricula->getAluno()->isAtivo()}
                                        {$matricula->getAluno()->getNome()}
                                    {/if}
                                </td>
                                <td>{$matricula->getCurso()->getNome()}</td>
                                <td>
                                    <span class="badge bg-{if $matricula->getCurso()->isAtivo()}success{else}danger{/if}">
                                        {if $matricula->getCurso()->isAtivo()}Ativo{else}Inativo{/if}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-{if $matricula->getStatus() == 'Ativa'}success{else}danger{/if}">
                                        {$matricula->getStatus()}
                                    </span>
                                </td>
                                <td>
                                    <a href="/matriculas/editar/{$matricula->getId()}" 
                                       class="btn btn-sm btn-info">
                                        Editar
                                    </a>
                                    <a href="/matriculas/excluir/{$matricula->getId()}" 
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Tem certeza que deseja excluir esta matrícula?')">
                                        Excluir
                                    </a>
                                </td>
                            </tr>
                        {/foreach}
                    {else}
                        <tr>
                            <td colspan="6" class="text-center">Nenhuma matrícula cadastrada.</td>
                        </tr>
                    {/if}
                </tbody>
            </table>
        </div>
    </div>
</div>
{/block}
