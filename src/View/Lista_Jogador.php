
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Jogadores</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="bg-blue-400">
        <nav>
            <ul class="flex">
                <li>
                    <a href="../../index.html">Home</a>
                </li>
                <li>
                    <a href="../../src/View/Adicionar_Jogador.php">Novo Jogador</a>
                </li>
                <li>
                    <a href="../../src/View/Editar_Jogador.php">Editar Jogador</a>
                </li>
            </ul>
        </nav>
    </header>
    <main class="w-2/4 m-auto mt-9">
        <table class="table">
            <thead class="text-white bg-blue-600">
                <th>Nome</th>
                <th>Nacionalidade</th>
                <th>Time</th>
                <th>Idade</th>
                <th>Número da camisa</th>
                <th>Posição</th>
            </thead>
            <tbody>
                <?php
                session_start();
                foreach ($_SESSION['Lista_Jogador'] as $jogador) :
                ?>
                    <tr>
                        <td>
                            <?= $jogador['nome'] ?>
                        </td>
                        <td>
                            <?= $jogador['nacionalidade'] ?>
                        </td>
                        <td>
                            <?=  $jogador['time'] ?>
                        </td>
                        <td>
                            <?= $jogador['idade'] ?>
                        </td>
                        <td>
                            <?= $jogador['numero_camisa'] ?>
                        </td>
                        <td>
                            <?= $jogador['posicao'] ?>
                        </td>
                        <td>
                            <a href="../Controller/Jogador.php?operation=find&code=<?= $jogador["id_jogador"] ?>">Editar</a>
                            <a href="../Controller/Jogador.php?operation=delete&code=<?= $jogador["id_jogador"] ?>">Deletar</a>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>