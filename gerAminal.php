<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Cadastro de Animal</title>
</head>

<body>

    <main>
        <form action="dbAnimal.php" method="post" class="row g-3">
            <div class="col-md-6">
                <label for="ident" class="form-label">Indentificação</label>
                <input type="text" name="ident" id="ident" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="ident" class="form-label">Indentificação</label>
                <input type="text" name="ident" id="ident" class="form-control">
            </div>
            <div class="col-md-2">
                <label for="ident" class="form-label">Indentificação</label>
                <select class="form-select" aria-label="Default select example" id="ident">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>

            <div class="col-12">
                <label for="endereco" class="form-label">Enereço</label>
                <textarea name="endereco" id="endereco" class></textarea>
            </div>

            <button type="submit" name="btnGravar">Gravar</button>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>