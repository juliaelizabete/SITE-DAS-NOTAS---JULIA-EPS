
    <?php
    
    $aluno = $turma = $materia = '';
    $N1 = $N2 = $N3 = $media = 0;


    extract($_POST);

   
    if (isset($docente, $senha)) {
        if ($docente == 'docente' && $senha == '20221360') {
            header('Location: /julia/turma.html');
            exit;
        } else {
            echo 'Lamento, acesso negado. O usuário não foi localizado em nosso servidor';
            exit;
        }
    }

  
    if (isset($aluno, $materia, $turma)) {
        if (isset($N1, $N2, $N3)) {
            $media = ($N1 + $N2 + $N3) / 3;

            echo "<table>
                <tr><th colspan='2'>INSTITUTO FEDERAL DA BAHIA</th></tr>
                  <tr><td>Nome do Aluno:</td><td>$aluno</td></tr>
                <tr><td>Turma:</td><td>$turma</td></tr>
               <tr><td>Matéria:</td><td>$materia</td></tr>
                <tr><td>Nota 1:</td><td>$N1</td></tr>
                <tr><td>Nota 2:</td><td>$N2</td></tr>
                <tr><td>Nota 3:</td><td>$N3</td></tr>
                <tr><td>Média do Aluno:</td><td>$media</td></tr>
                <tr><td colspan='2'>";

            if ($media >= 6) {
                echo '<p>Aprovado!</p>';
            } else {
                echo '<p>Reprovado.</p>';
            }
            echo "</td></tr></table>";

            $text = "Turma: $turma, Matéria: $materia, Nome do Aluno: $aluno, Nota 1: $N1, Nota 2: $N2, Nota 3: $N3, Média: $media\n";
            $arq = fopen("teste.dat", "a");
            fwrite($arq, $text);
            fclose($arq);
        } else {
            echo 'Lamento, notas não foram fornecidas.';
        }
    } else {
        echo 'Lamento, algo deu errado!';
    }
    ?>
