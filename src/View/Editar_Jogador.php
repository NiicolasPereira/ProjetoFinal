<?php

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Jogador</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="bg-purple-400">
        <nav>
            <ul class="flex">
                <li class="mx-2">
                    <a href="../../index.html">Página inicial</a>
                </li>
                <li class="mx-4">
                    <a href="../Controller/Jogador.php?operation=list">Listar Jogadores</a>
                </li>
            </ul>
        </nav>
    </header>
    <form action="../Controller/Jogador.php?operation=edit" method="POST">
        <?php
        session_start();
        $jogador = $_SESSION['jogador_data'];
        ?>
        <input type="hidden" name="code" value=<?= $jogador['id_jogador'] ?>>
        <section class="mx-4 mt-4 columns-3">
            <article>
                <label for="nome" class="cursor-pointer">Nome do Jogador: </label>
                <input type="text" name="nome" id="nome" class="border border-purple-400" required>
            </article>
            <article>
                <label for="nacionalidade" class="cursor-pointer">Nacionalidade: </label>
                <input type="text" id="nacionalidade" name="nacionalidade" class="border border-purple-400" required>
            </article>
            <article>
                <label for="time" class="cursor-pointer">Time: </label>
                <input type="text" name="time" id="time" class="border border-purple-400" required>
            </article>
        </section>
        <section class="mx-4 mt-4 columns-3">
            <article>
                <label for="idade" class="cursor-pointer">Idade: </label>
                <input type="number" name="idade" id="idade" class="border border-purple-400" required min=1 max=1000>
            </article>
            <article>
                <label for="numero_camisa" class="cursor-pointer">Número da Camisa: </label>
                <input type="number" name="numero_camisa" id="numero_camisa" class="border border-purple-400" required min=1 max=10000>
            </article>
            <article>
                <label for="posicao" class="cursor-pointer">Posição: </label>
                <input type="text" name="posicao" id="posicao" class="border border-purple-400" required min=1 max=10000>
            </article>
        </section>
        <article class="flex justify-center mt-3">
            <button type="submit" class="p-3 text-white bg-purple-700 rounded">Salvar</button>
        </article>
    </form>
</body>

</html>