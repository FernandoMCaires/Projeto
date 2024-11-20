<!DOCTYPE html>
<html>
<head>
    <title>{$title|default:'Sistema de Matrículas'}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        {block name="css_login"}{/block}
        <link href="css/main/main.css" rel="stylesheet">
        {block name="css_main"}{/block}
    
</head>
<body>
    <div class="container">
        {if isset($smarty.session.usuario_id)}
            <div class="logout-button">
                <a href="/logout" class="btn-logout">Sair</a>
            </div>
        {/if}
        {block name="content"}{/block}
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>