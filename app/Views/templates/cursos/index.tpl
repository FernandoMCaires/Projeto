{extends file="layouts/main.tpl"}

{block name="content"}
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Cursos</h1>
        <a href="/cursos/novo" class="btn btn-primary">Novo Curso</a>
    </div>

    {if isset($error)}
        <div class="alert alert-danger">{$error}</div>
    {/if}

    {if isset($success)}
        <div class="alert alert-success">{$success}</div>
    {/if}

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th width="200">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    {if $cursos}
                        {foreach $cursos as $curso}
                            <tr>
                                <td>{$curso->getId()}</td>
                                <td>{$curso->getNome()}</td>
                                <td>{$curso->getDescricao()}</td>
                                <td>
                                    <a href="/cursos/editar/{$curso->getId()}" 
                                       class="btn btn-sm btn-info">
                                        Editar
                                    </a>
                                    <a href="/cursos/excluir/{$curso->getId()}" 
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Tem certeza que deseja excluir este curso?')">
                                        Excluir
                                    </a>
                                </td>
                            </tr>
                        {/foreach}
                    {else}
                        <tr>
                            <td colspan="4" class="text-center">Nenhum curso cadastrado.</td>
                        </tr>
                    {/if}
                </tbody>
            </table>
        </div>
    </div>
</div>
{/block}