{extends file="layouts/main.tpl"}

{block name="content"}
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Alunos</h1>
        <a href="/alunos/novo" class="btn btn-primary">Novo Aluno</a>
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
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Data de Nascimento</th>
                        <th width="200">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    {if $alunos}
                        {foreach $alunos as $aluno}
                            <tr>
                                <td>{$aluno->getId()}</td>
                                <td>{$aluno->getNome()}</td>
                                <td>{$aluno->getEmail()}</td>
                                <td>{$aluno->getDataNascimento()|date_format:"%d/%m/%Y"}</td>
                                <td>
                                    <a href="/alunos/editar/{$aluno->getId()}" 
                                       class="btn btn-sm btn-info">
                                        Editar
                                    </a>
                                    <a href="/alunos/excluir/{$aluno->getId()}" 
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Tem certeza que deseja excluir este aluno?')">
                                        Excluir
                                    </a>
                                </td>
                            </tr>
                        {/foreach}
                    {else}
                        <tr>
                            <td colspan="5" class="text-center">Nenhum aluno cadastrado.</td>
                        </tr>
                    {/if}
                </tbody>
            </table>
        </div>
    </div>
</div>
{/block}