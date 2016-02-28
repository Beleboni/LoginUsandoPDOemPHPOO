<?php
include_once 'Conexao.php';
include_once 'iLOGIN.php';


class LogarAdmin extends Conexao implements iLogin{

    private $usuario;
    private $senha;
    private $erro;

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getErro() {
        return $this->erro;
    }

    public function setErro($erro) {
        $this->erro = $erro;
    }

    public function deslogar() {
        
    }

    public function logar() {
        $pdo = parent::getDB();

        try {
            $logar = $pdo->prepare("SELECT * FROM cliente WHERE login = :login 
                                   AND senha = :senha");
            $logar->bindValue(":login", $this->getUsuario());
            $logar->bindValue(":senha", $this->getSenha());
            $logar->execute();

            if ($logar->rowCount() == 1):
                $dados = $logar->fetch(PDO::FETCH_ASSOC);
                $_SESSION['logado'] = true;
                $_SESSION['nome'] = $dados['nome'];
                $_SESSION['id'] = $dados['id'];
            else:
                $this->setErro("Erro ao logar, usuário ou senha inválidos");
            endif;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public static function verificaLogado() {
          if(!isset($_SESSION['logado'])):
              header("Location: index.php");
          endif;
    }

}

