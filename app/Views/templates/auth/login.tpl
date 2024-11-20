{extends file="layouts/main.tpl"}
    {block name="css_login"}
    <link href="/css/login/login.css" rel="stylesheet">
{/block}
{block name="content"}
    <div class="row justify-content-center mt-5">
        <div class="col-12 text-center">
            <h1 class='title mb-4'>Jubilut - Administrativo</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Login</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="/login">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" required>
                        </div>

                        {if isset($error)}
                            <div class="alert alert-danger">
                                {$error}
                            </div>
                        {/if}
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
{/block}