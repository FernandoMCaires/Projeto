{extends file="layouts/main.tpl"}

{block name="content"}
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Matrículas</h1>
        <a href="/matriculas/novo" class="btn btn-primary">Nova Matrícula</a>
    </div>

    {if isset($error)}
        <div class="alert alert-danger">{$error}</div>
    {/if}

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Aluno</th>
                        <th>Curso</th>
                        <th>Data da Matrícula</th>
                        <th>Status</th>
                        <th width="200">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    {if $matriculas}
                        {foreach $matriculas as $matricula}
                            <tr>
                                <td>{$matricula->getId()}</td>
                                <td>{$matricula->getAluno()->getNome()}</td>
                                <td>{$matricula->getCurso()->getNome()}</td>
                                <td>{$matricula->getDataMatricula()|date_format:"%d/%m/%Y"}</td>
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
