{extends file="layouts/main.tpl"}

{block name="content"}
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1>Dashboard</h1>
            <p>Bem-vindo, {$usuario_nome}!</p>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Cursos</h5>
                    <p class="card-text">Gerenciar cursos do sistema.</p>
                    <a href="/cursos" class="btn btn-primary">Ver Cursos</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Alunos</h5>
                    <p class="card-text">Gerenciar alunos do sistema.</p>
                    <a href="/alunos" class="btn btn-primary">Ver Alunos</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Matrículas</h5>
                    <p class="card-text">Gerenciar matrículas do sistema.</p>
                    <a href="/matriculas" class="btn btn-primary">Ver Matrículas</a>
                </div>
            </div>
        </div>
    </div>
</div>
{/block}