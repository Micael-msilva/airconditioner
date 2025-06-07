CREATE DATABASE IF NOT EXISTS airconditioner;
USE airconditioner;

CREATE TABLE IF NOT EXISTS technician (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cpf_cnpj VARCHAR(20) NOT NULL UNIQUE,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(200),
    phone VARCHAR(20),
    crea VARCHAR(20),
    email VARCHAR(255),
    UNIQUE(email)
);

CREATE TABLE IF NOT EXISTS client (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(20)
);

CREATE TABLE IF NOT EXISTS pmoc (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    creation_date DATE,
    service_address VARCHAR(255),
    id_technician INT NOT NULL,
    id_client INT NOT NULL,
    FOREIGN KEY (id_technician) REFERENCES technician(id) ON DELETE CASCADE,
    FOREIGN KEY (id_client) REFERENCES client(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS air_conditioner (
    id INT AUTO_INCREMENT PRIMARY KEY,
    brand VARCHAR(50) NOT NULL,
    btus INT,
    description TEXT,
    location VARCHAR(100),
    id_pmoc INT NOT NULL,
    FOREIGN KEY (id_pmoc) REFERENCES pmoc(id) ON DELETE CASCADE
);
