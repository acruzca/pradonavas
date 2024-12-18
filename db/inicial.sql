-- Base de datos: pradodb
CREATE DATABASE pradodb;
USE pradodb;

-- Tabla de usuarios (propietarios y turistas)
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    auth_key VARCHAR(32),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabla de apartamentos
CREATE TABLE apartment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    location VARCHAR(255),
    price DECIMAL(10, 2) NOT NULL,
    availability_from DATE NOT NULL,
    availability_to DATE NOT NULL,
    owner_id INT,
    FOREIGN KEY (owner_id) REFERENCES user(id) ON DELETE CASCADE
);

-- Tabla de reservas
CREATE TABLE reservation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    apartment_id INT,
    user_id INT,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    total_price DECIMAL(10, 2) NOT NULL,
    status ENUM('pending', 'confirmed', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (apartment_id) REFERENCES apartment(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE
);

ALTER TABLE reservation
ADD CONSTRAINT chk_dates CHECK (start_date < end_date);

-- Tabla de valoraciones
CREATE TABLE review (
    id INT AUTO_INCREMENT PRIMARY KEY,
    apartment_id INT,
    user_id INT,
    rating TINYINT CHECK (rating BETWEEN 1 AND 5),
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (apartment_id) REFERENCES apartment(id),
    FOREIGN KEY (user_id) REFERENCES user(id)
);


-- Tabla de huéspedes
CREATE TABLE guest (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reservation_id INT NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    document_number VARCHAR(50) NOT NULL,
    birth_date DATE NOT NULL,
    phone_number VARCHAR(20),
    email VARCHAR(255),
    FOREIGN KEY (reservation_id) REFERENCES reservation(id) ON DELETE CASCADE
);

-- Añadir persona de contacto a la tabla de reservas
ALTER TABLE reservation
ADD contact_name VARCHAR(255) NULL,
ADD contact_phone VARCHAR(20) NULL,
ADD contact_email VARCHAR(255) NULL;

-- Facturas de reservas
CREATE TABLE invoice (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reservation_id INT NOT NULL,
    total_amount DECIMAL(10, 2) NOT NULL,
    issue_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    invoice_number VARCHAR(50) UNIQUE NOT NULL,
    FOREIGN KEY (reservation_id) REFERENCES reservation(id) ON DELETE CASCADE
);

-- Recibos de reservas
CREATE TABLE receipt (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reservation_id INT NOT NULL,
    amount_paid DECIMAL(10, 2) NOT NULL,
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    payment_method ENUM('cash', 'card', 'transfer') NOT NULL,
    FOREIGN KEY (reservation_id) REFERENCES reservation(id) ON DELETE CASCADE
);

CREATE TABLE expense (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(255) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    description TEXT,
    expense_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE fiscal_summary (
    id INT AUTO_INCREMENT PRIMARY KEY,
    total_income DECIMAL(10, 2),
    total_expenses DECIMAL(10, 2),
    net_profit DECIMAL(10, 2),
    start_date DATE,
    end_date DATE
);