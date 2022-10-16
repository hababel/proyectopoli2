<?php 


    class LoginModel{ 

        private $pdo;

        function __construct(){
            $this->pdo = Database::Conectar(); //Crea instancia de la funcion que conecta a la base de datos.
         }

         /* Script que busca en la base de datos el usuario y contraseña ingresados en el login */
        public function validalogin($emailuser_input){
            $sql="SELECT id, 
                    nombre,
                    Nombre_Corto,
                    Email, 
                    Clave,
                    tipo_usuario,
                    token,
                    estado  FROM usuarios WHERE Email = ? ";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($emailuser_input));
            return $stm->fetch(PDO::FETCH_OBJ);
        }

        /* Actualiza la DB con token generado aleatorio para recuperar contraseña */
        public function updatetoken($token_genered, $idusuario){
                
            $sql="UPDATE usuarios 
                  SET
                  token = ?
                  WHERE id = ? ";
            $stm = $this->pdo->prepare($sql);
            return $stm->execute(array($token_genered, $idusuario));
        }

        /* valida el token enviando al usuario al solicitar recuperar contraseña */
        public function validatetoken($fp_code){

            $sql= "SELECT id,token from usuarios WHERE token = ? ";
            $stm = $this->pdo->prepare($sql);
            return $stm->execute(array($fp_code));

        }

        /* Cambia la contraseña del usuario */
        public function resetpass($newpass, $fp_code){
            $sql="UPDATE usuarios 
            SET clave = ?, token=''
            WHERE token = ? ";

            $stm = $this->pdo->prepare($sql);
            return $stm->execute(array($newpass, $fp_code));
        }
        
    }
