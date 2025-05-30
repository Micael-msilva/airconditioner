<?php

require_once __DIR__ . '/../Technician.php';
require_once __DIR__ . '/../Conexao.php';


class TechnicianDAO {

    /**
     * @param Technician
     * @return bool 
     */
    public function insert(Technician $technician) {
        try {
            $conn = Conexao::getConnection();
            
            $sql = "INSERT INTO technician (name, email, phone, cpfCnpj, crea, address) 
                    VALUES (:name, :email, :phone, :cpfCnpj, :crea, :address)";
            
            $stmt = $conn->prepare($sql);
            
            // Vincular os parâmetros
            $stmt->bindParam(':name', $technician->getName());
            $stmt->bindParam(':email', $technician->getEmail());
            $stmt->bindParam(':phone', $technician->getPhone());
            $stmt->bindParam(':cpfCnpj', $technician->getCpfCnpj());
            $stmt->bindParam(':crea', $technician->getCrea());
            $stmt->bindParam(':address', $technician->getAddress());

            // Executar a inserção
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao inserir técnico: " . $e->getMessage();
            return false;
        }
    }

    public function take($id) {
        try {
            $conn = Conexao::getConnection();
            // Alteração: Use a cláusula WHERE para filtrar por id
            $sql = "SELECT * FROM technician WHERE id = :id";
            
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
    
            // Recuperando os dados do técnico
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($result) {
                // Aqui você pode retornar um objeto Technician ou os dados diretamente
                // Exemplo: Criando um objeto Technician a partir dos dados
                return new Technician(
                    $result['name'],
                    $result['email'],
                    $result['phone'],
                    $result['cpfCnpj'],
                    $result['crea'],
                    $result['id'],
                    $result['address']

                );
            } else {
                return null;  // Nenhum técnico encontrado com o id fornecido
            }
    
        } catch (PDOException $e) {
            echo "Erro ao buscar técnico: " . $e->getMessage();
            return false;
        }
    }
    
}
