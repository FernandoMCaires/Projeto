{extends file="layouts/main.tpl"}
{block name="content"}
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="/dashboard" class="btn btn-primary"> Voltar </a>
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
                                <td class="text-center">
                                    <a href="/alunos/toggle-status/{$aluno->getId()}" 
                                       class="btn btn-sm {if $aluno->isAtivo()}btn-success{else}btn-danger{/if}"
                                       onclick="return confirm('Deseja alterar o status deste aluno?')">
                                        {if $aluno->isAtivo()}Ativo{else}Inativo{/if}
                                    </a>
                                    <a href="/alunos/editar/{$aluno->getId()}" class="btn btn-sm btn-info">
                                        <i class="bi bi-pencil-fill"></i> Editar
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