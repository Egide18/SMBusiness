CREATE DATABASE IF NOT EXISTS smb_private_care
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE smb_private_care;

CREATE TABLE IF NOT EXISTS consultations (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nom_complet VARCHAR(160) NOT NULL,
  genre ENUM('Masculin','Féminin','Autre / Préfère ne pas dire') NOT NULL,
  date_naissance DATE NOT NULL,
  lieu_naissance VARCHAR(120) NOT NULL,
  telephone VARCHAR(40) NOT NULL,
  adresse VARCHAR(240) NOT NULL,
  service ENUM('Kinesitherapie','Soins','Massage','Aines') NOT NULL,
  seances INT NOT NULL CHECK (seances IN (5,10,15,20,25,30,40,50)),
  paiement ENUM('Airtel Money','mPesa','EquityBCDC') NOT NULL,
  details TEXT NULL,
  source VARCHAR(60) DEFAULT 'site-web',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX (service), INDEX (created_at), INDEX (telephone)
);

CREATE TABLE IF NOT EXISTS admins (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(190) UNIQUE NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

/* Exemple d’admin: remplacez le hash ci-dessous par un vrai hash bcrypt généré avec PHP */
INSERT INTO admins (email, password_hash)
VALUES ('admin@smbusiness.drc', '$2y$10$ReplaceWithRealBcryptHash_____________________________________');