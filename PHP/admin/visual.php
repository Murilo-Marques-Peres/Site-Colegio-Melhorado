<div class="container">
                <div class="principal">
                    <div class="containerP">
                        <div class="visual">
                            <h1>Visualização</h1>
                        </div>
                        <form class="aluno" method="POST">
                            <label for="serie">Escolha a série:</label>
                            <select name="serie">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                            <label for="Ensino">Escolha o Ensino:</label>
                            <select name="ensino" style="width: 100px;">
                                <option>Fundamental</option>
                                <option>Médio</option>
                            </select>
                            <label for="turma">Escolha a turma:</label>
                            <select name="turma">
                                <option>A</option>
                                <option>B</option>
                            </select>
                            <div class="form1">
                                <input type="text" name="nomePesquisado" placeholder="Digite o nome do aluno" style="margin-right:10px;"/>
                                <input type="submit" id="botaoA" name="acao1" value="Pesquisar Nome"/>
                                <input type="text" name="pesquisaCPF" placeholder="Digite o cpf do aluno"/>
                                <input id="submitNotaMateria" type="submit" name="acaoNotasMateria" value="Pesquisar Notas do aluno"/>
                            </div>
                        </form>
                    </div> <!--containerP-->
                    
                    <div class="tableNotas">
                    <?php
                        function serieTurma(){
                            $serie = $_POST["serie"];
                            $turma = $_POST["turma"];
                            $ensinoPalavra = $_POST["ensino"];

                            if($ensinoPalavra == "Fundamental"){
                                $ensinoNumero = 1;
                            }
                            if($ensinoPalavra == "Médio"){
                                $ensinoNumero = 2;
                            }

                            $serieTurma = $serie.$ensinoNumero.$turma;
                            return $serieTurma;
                            
                        }

                        if(isset($_POST["acao1"])){
                            $serieTurma = serieTurma();
                            $nomePesquisa = $_POST["nomePesquisado"]."%";
                            $sql = $pdo->prepare("SELECT aluno.cpf, aluno.nome, turma.serieturma FROM aluno INNER JOIN turma
                            on aluno.turmaid = turma.id WHERE turma.serieturma = ? && aluno.nome LIKE ?");
                            $sql->execute(array($serieTurma,$nomePesquisa));
                            $listaNome = $sql->fetchAll();
                            echo "<table>
                            <tr class='table'>
                            <th>CPF</th>
                            <th>Nome</th>
                            <th>Turma</th>
                            </tr>";
                            foreach($listaNome as $element){
                                echo "<td>";
                                echo $element["cpf"];
                                echo "</td>";
                                echo "<td>";
                                echo $element["nome"];
                                echo "</td>";
                                echo "<td>";
                                echo $element["serieturma"];
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        }
                            
                    ?>
                        <?php
                            if(isset($_POST["acaoNotasMateria"])){
                                $cpfPesquisa = $_POST["pesquisaCPF"];
                                $cpfPesquisa = str_replace(" ", "", $cpfPesquisa);
                                $sql = $pdo->prepare("SELECT desempenho.cpf, aluno.nome, materia.nome as materia, desempenho.nota1, desempenho.nota2, desempenho.nota3 FROM desempenho 
                                INNER JOIN materia ON desempenho.idmateria = materia.id
                                INNER JOIN aluno ON desempenho.cpf = aluno.cpf
                                WHERE desempenho.cpf = ?");
                                $sql->execute(array($cpfPesquisa));
                                $listaNome = $sql->fetchAll();
                                echo "<table>
                                <tr class='table'>
                                <th>CPF</th>
                                <th>Nome</th>
                                <th>Materia</th>
                                <th style='width: 60px;'>Nota 1</th>
                                <th style='width: 60px;'>Nota 2</th>
                                <th style='width: 60px;'>Nota 3</th>
                                </tr>";
                                foreach($listaNome as $element){
                                    echo "<td>";
                                    echo $element["cpf"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $element["nome"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $element["materia"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $element["nota1"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $element["nota2"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $element["nota3"];
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                            }
                        ?>
                    </div><!--tableNotas-->


                </div><!--principal-->
            </div><!--container-->