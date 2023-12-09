<div class="container2">
                <div class="principal2">
                    <div class="separador">
                        <div class="visual">
                            <h1>Alteração</h1>
                        </div>
                        <form method="POST">
                            <input name="cpfSelecionado" class="cpfMudar" type="text" placeholder="Digite o CPF do aluno para Alteração"/>
                            <label class="elementoMudar" for="materiaDef">Escolha a matéria a definir nota</label>
                            <select class="mudarSelect" name="materiaDef">
                                <option value="Matemática">Matemática</option>
                                <option value="Fisica">Fisica</option>
                                <option value="Química">Química</option>
                                <option value="Biologia">Biologia</option>
                                <option value="Português">Português</option>
                                <option value="Literatura">Literatura</option>
                                <option value="História">História</option>
                                <option value="Sociologia">Sociologia</option>
                                <option value="Filosofia">Filosofia</option>
                                <option value="Geografia">Geografia</option>
                            </select>
    
    
                            </select>
                            <label class="elementoMudar" for="notaDef">Escolha a nota a definir:</label>
                            <select class="selectMudar2" name="notaDef" >
                                <option value="Nota 1">Nota 1</option>
                                <option value="Nota 2">Nota 2</option>
                                <option value="Nota 3">Nota 3</option>
                            </select>
                            <div class="MaisEspaco">
                                <label for="campoNota">Defina a nota:</label>
                                <input type="text" name="campoNota" placeholder="Nota" style="width: 45px; text-align:center;"/>
                                <input class="submitMudar" type="submit" name="acaoMudarNota" value="Definir nota" style="margin-left:10px"/>
                            </div><!--MaisEspaco-->
                        </form>

                    </div><!--separador-->
                    <?php 
                        function inserirNota($notaDefinida, $cpfSelecionado,$materiaSelecionada, $indexNota, $pdo){
                            if($indexNota == "nota1"){
                                $sql = $pdo->prepare("SELECT desempenho.idmateria, materia.nome, desempenho.cpf FROM desempenho
                                INNER JOIN materia ON desempenho.idmateria = materia.id WHERE cpf = ? && nome = ?");
                                $sql->execute(array($cpfSelecionado, $materiaSelecionada));
                                $listaMateria = $sql->FetchAll(PDO::FETCH_ASSOC);
                                $notaDefinidaMudada = str_replace(",",".", $notaDefinida);
                                $notaDefinidaMudadaFinal = floatval($notaDefinidaMudada);
                                $sql2 = $pdo->prepare("SELECT cpf FROM aluno WHERE cpf = ?");
                                $sql2->execute(array($cpfSelecionado));
                                $listaCPF = $sql2->FetchAll(PDO::FETCH_ASSOC);
                                foreach($listaCPF as $elementCPF){
                                    $cpfVerificado = $elementCPF["cpf"];
                                }
                                foreach($listaMateria as $elementMateria){
                                    $indexMateria = $elementMateria["idmateria"];
                                }
                                if($sql->rowCount() > 0){
                                    $updateConfirmation = true;
                                }else{
                                    $updateConfirmation = false;
                                }
                                if($updateConfirmation){
                                    $sql = $pdo->prepare("UPDATE desempenho SET nota1 = ? WHERE cpf = ? && ano = ? && idmateria = ?");
                                    $sql->execute(array($notaDefinidaMudadaFinal, $cpfSelecionado, 2023, $indexMateria));
                                }
                                if(!$updateConfirmation){
                                    $sql3 = $pdo->prepare("SELECT * FROM materia WHERE nome = ?");
                                    $sql3->execute(array($materiaSelecionada));
                                    $listaMateriaPesquisa = $sql3->FetchAll(PDO::FETCH_ASSOC);
                                    foreach($listaMateriaPesquisa as $element){
                                        $indexMateria = $element["id"];
                                    }
                                    $sql5 = $pdo->prepare("SELECT turmaid FROM aluno WHERE cpf = ?");
                                    $sql5->execute(array($cpfVerificado));
                                    $listaIdTurma = $sql5->FetchAll(PDO::FETCH_ASSOC);
                                    foreach($listaIdTurma as $element){
                                        $idTurma = $element["turmaid"];
                                    }
                                    if(isset($cpfVerificado)){
                                        $sql4 = $pdo->prepare("INSERT INTO desempenho (cpf, ano, idmateria, nota1) values (?,?,?,?)");
                                        $sql4->execute(array($cpfVerificado, 2023, $indexMateria, $notaDefinidaMudadaFinal));

                                    }
                                }
                                
                            }
                            if($indexNota == "nota2"){
                                $sql = $pdo->prepare("SELECT desempenho.idmateria, materia.nome, desempenho.cpf FROM desempenho
                                INNER JOIN materia ON desempenho.idmateria = materia.id WHERE cpf = ? && nome = ?");
                                $sql->execute(array($cpfSelecionado, $materiaSelecionada));
                                $listaMateria = $sql->FetchAll(PDO::FETCH_ASSOC);
                                $notaDefinidaMudada = str_replace(",",".", $notaDefinida);
                                $notaDefinidaMudadaFinal = floatval($notaDefinidaMudada);
                                $sql2 = $pdo->prepare("SELECT cpf FROM aluno WHERE cpf = ?");
                                $sql2->execute(array($cpfSelecionado));
                                $listaCPF = $sql2->FetchAll(PDO::FETCH_ASSOC);
                                foreach($listaCPF as $elementCPF){
                                    $cpfVerificado = $elementCPF["cpf"];
                                }
                                foreach($listaMateria as $elementMateria){
                                    $indexMateria = $elementMateria["idmateria"];
                                }
                                if($sql->rowCount() > 0){
                                    $updateConfirmation = true;
                                }else{
                                    $updateConfirmation = false;
                                }
                                if($updateConfirmation){
                                    $sql = $pdo->prepare("UPDATE desempenho SET nota2 = ? WHERE cpf = ? && ano = ? && idmateria = ?");
                                    $sql->execute(array($notaDefinidaMudadaFinal, $cpfSelecionado, 2023, $indexMateria));
                                }
                                if(!$updateConfirmation){
                                    $sql3 = $pdo->prepare("SELECT * FROM materia WHERE nome = ?");
                                    $sql3->execute(array($materiaSelecionada));
                                    $listaMateriaPesquisa = $sql3->FetchAll(PDO::FETCH_ASSOC);
                                    foreach($listaMateriaPesquisa as $element){
                                        $indexMateria = $element["id"];
                                    }
                                    $sql5 = $pdo->prepare("SELECT turmaid FROM aluno WHERE cpf = ?");
                                    $sql5->execute(array($cpfVerificado));
                                    $listaIdTurma = $sql5->FetchAll(PDO::FETCH_ASSOC);
                                    foreach($listaIdTurma as $element){
                                        $idTurma = $element["turmaid"];
                                    }
                                    if(isset($cpfVerificado)){
                                        $sql4 = $pdo->prepare("INSERT INTO desempenho (cpf, ano, idmateria, nota2) values (?,?,?,?)");
                                        $sql4->execute(array($cpfVerificado, 2023, $indexMateria, $notaDefinidaMudadaFinal));

                                    }
                                }
                                
                            }
                            if($indexNota == "nota3"){
                                $sql = $pdo->prepare("SELECT desempenho.idmateria, materia.nome, desempenho.cpf FROM desempenho
                                INNER JOIN materia ON desempenho.idmateria = materia.id WHERE cpf = ? && nome = ?");
                                $sql->execute(array($cpfSelecionado, $materiaSelecionada));
                                $listaMateria = $sql->FetchAll(PDO::FETCH_ASSOC);
                                $notaDefinidaMudada = str_replace(",",".", $notaDefinida);
                                $notaDefinidaMudadaFinal = floatval($notaDefinidaMudada);
                                $sql2 = $pdo->prepare("SELECT cpf FROM aluno WHERE cpf = ?");
                                $sql2->execute(array($cpfSelecionado));
                                $listaCPF = $sql2->FetchAll(PDO::FETCH_ASSOC);
                                foreach($listaCPF as $elementCPF){
                                    $cpfVerificado = $elementCPF["cpf"];
                                }
                                foreach($listaMateria as $elementMateria){
                                    $indexMateria = $elementMateria["idmateria"];
                                }
                                if($sql->rowCount() > 0){
                                    $updateConfirmation = true;
                                }else{
                                    $updateConfirmation = false;
                                }
                                if($updateConfirmation){
                                    $sql = $pdo->prepare("UPDATE desempenho SET nota3 = ? WHERE cpf = ? && ano = ? && idmateria = ?");
                                    $sql->execute(array($notaDefinidaMudadaFinal, $cpfSelecionado, 2023, $indexMateria));
                                }
                                if(!$updateConfirmation){
                                    $sql3 = $pdo->prepare("SELECT * FROM materia WHERE nome = ?");
                                    $sql3->execute(array($materiaSelecionada));
                                    $listaMateriaPesquisa = $sql3->FetchAll(PDO::FETCH_ASSOC);
                                    foreach($listaMateriaPesquisa as $element){
                                        $indexMateria = $element["id"];
                                    }
                                    $sql5 = $pdo->prepare("SELECT turmaid FROM aluno WHERE cpf = ?");
                                    $sql5->execute(array($cpfVerificado));
                                    $listaIdTurma = $sql5->FetchAll(PDO::FETCH_ASSOC);
                                    foreach($listaIdTurma as $element){
                                        $idTurma = $element["turmaid"];
                                    }
                                    if(isset($cpfVerificado)){
                                        $sql4 = $pdo->prepare("INSERT INTO desempenho (cpf, ano, idmateria, nota3) values (?,?,?,?)");
                                        $sql4->execute(array($cpfVerificado, 2023, $indexMateria, $notaDefinidaMudadaFinal));

                                    }
                                }
                                
                            }

                        }
                        
                        if(isset($_POST["acaoMudarNota"])){
                            $notaDefinida = $_POST["campoNota"];
                            $cpfSelecionado = $_POST["cpfSelecionado"];
                            $cpfSelecionado = str_replace(" ", "", $cpfSelecionado);
                            $materiaSelecionada = $_POST["materiaDef"] ;
                            $notaSelecionada = $_POST["notaDef"];
                            $indexNota = "";
                            if($notaSelecionada == "Nota 1"){
                                $indexNota = "nota1";
                            }
                            if($notaSelecionada == "Nota 2"){
                                $indexNota = "nota2";
                            }
                            if($notaSelecionada == "Nota 3"){
                                $indexNota = "nota3";
                            }

                            inserirNota($notaDefinida, $cpfSelecionado,$materiaSelecionada, $indexNota,$pdo);
                        }

                    ?>
                    
                </div><!--principal2-->
            </div><!--container2-->