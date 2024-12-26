CREATE DATABASE gestion_location_oop;
USE gestion_location_oop;

-- Table des utilisateurs
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'employe') NOT NULL
);
-- Ajouter les colonnes firstName et lastName à la table user
ALTER TABLE user
ADD firstName VARCHAR(50),
ADD lastName VARCHAR(50);

select * from user;

-- Table des voitures
CREATE TABLE voiture (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marque VARCHAR(50) NOT NULL,
    modele VARCHAR(50) NOT NULL,
    immatriculation VARCHAR(20) NOT NULL UNIQUE,
    disponibilite BOOLEAN NOT NULL DEFAULT TRUE
);

-- Table des contrats
CREATE TABLE contrats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    id_voiture INT NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    FOREIGN KEY (id_user) REFERENCES user(id) ON DELETE CASCADE,
    FOREIGN KEY (id_voiture) REFERENCES voiture(id) ON DELETE CASCADE
);

INSERT INTO voiture (marque, modele, immatriculation, disponibilite) VALUES
 ('Toyota', 'Corolla', '1234-ABC', TRUE),
 ('BMW', 'X5', '5678-DEF', TRUE);

