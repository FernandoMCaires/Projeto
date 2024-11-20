{extends file="layouts/main.tpl"}

{block name="content"}
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2>{if isset($aluno)}Editar{else}Novo{/if} Aluno</h2>
                        <a href="/alunos" class="btn btn-secondary">Voltar</a>
                    </div>
                </div>
                <div class="card-body">
                    {if isset($error)}
                        <div class="alert alert-danger">{$error}</div>
                    {/if}

                    <form method="POST" action="{if isset($aluno)}/alunos/update/{$aluno->getId()}{else}/alunos/criar{/if}">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" 
                                   class="form-control" 
                                   id="nome" 
                                   name="nome" 
                                   value="{if isset($aluno)}{$aluno->getNome()}{/if}"
                                   required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" 
                                   class="form-control" 
                                   id="email" 
                                   name="email" 
                                   value="{if isset($aluno)}{$aluno->getEmail()}{/if}"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                            <input type="date" 
                                   class="form-control" 
                                   id="data_nascimento" 
                                   name="data_nascimento" 
                                   value="{if isset($aluno)}{$aluno->getDataNascimento()->format('Y-m-d')}{/if}"
                                   required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="/alunos" class="btn btn-secondary">Voltar</a>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{/block}