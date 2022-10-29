<?php 


    class UsuarioModel{

        private $pdo;

        function __construct(){
            try{
                $this->pdo = Database::Conectar(); //Crea instancia de la funcion que conecta a la base de datos.
             }catch(Exception $e){
                 die($e->getMessage());
             }
         }

         /* Scriptpara listar los usuarios existentes */
        function list_usuarios(){

            $sql = "SELECT us.id, 
                        us.nombre,
                        us.Nombre_Corto,
                        us.Email, 
                        us.tipo_usuario,
                        us.estado,
                        tu.desc_tipo
                        FROM usuarios us
                        INNER JOIN tipo_usuario tu ON tu.id_tipo_usuario= us.tipo_usuario";

            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        function buscar_usuario($email){
            $sql="SELECT 
                    us.Email 
                from usuarios us 
                where us.Email=".$email;
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            return ($stm->fetch(PDO::FETCH_OBJ));
        }

        /* Script para crear usuario nuevo */
        function crear_usuario($nombre,$Nombre_Corto,$Email,$Clave,$tipo_usuario,$estado){
            $sql="INSERT INTO usuarios (nombre, Nombre_Corto, Email, Clave, tipo_usuario, estado) 
                    VALUES (?,?,?,?,?,?)";
            $stm = $this->pdo->prepare($sql);
            return $stm->execute(array($nombre,$Nombre_Corto,$Email,$Clave,$tipo_usuario,$estado));
        }

        /* Script que edita informacion del usuario */
        function editar_usuario($idUser, $nombre_usuarionuevo, $nombre_corto, $correo_usuarionuevo, $estadousuario, $idPerfil_usuarionuevo){
           $sql= " UPDATE usuarios 
                  SET nombre=?, Nombre_Corto=?, Email=?, tipo_usuario=?, estado=?
                  WHERE id=?";
              $stm = $this->pdo->prepare($sql);
              return $stm->execute(array($nombre_usuarionuevo, $nombre_corto, $correo_usuarionuevo, $idPerfil_usuarionuevo, $estadousuario,$idUser));
        }
       
        /* Script que cambia la contraseña */
       function cambiar_clave($idUsuario,$clave){
            $sql="UPDATE usuarios
                  SET Clave=?
                  WHERE id=?";
             $stm = $this->pdo->prepare($sql);
             return $stm->execute(array($clave,$idUsuario));     
       }

       /* Script donde consulta en la DB los perfiles en la tabla perfiles */
        function consultarPerfilesUsuarios(){
            $sql = "SELECT * FROM tipo_usuario";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

    }

    ?>
    