-- Create table members
CREATE TABLE members (
    member_id INT AUTO_INCREMENT PRIMARY KEY,
    member_name VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    join_date DATE NOT NULL
);

-- Create Tabel products
CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL
);

-- Create table sales
CREATE TABLE sales (
    sales_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    member_id INT NOT NULL,
    sale_date DATETIME NOT NULL,
    quantity INT NOT NULL,
    selling_price DECIMAL(10, 2) NOT NULL,
    total_price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(product_id),
    FOREIGN KEY (member_id) REFERENCES members(member_id)
);

-- Insert data into members table
INSERT INTO members (member_id, member_name, phone_number, email, join_date) VALUES
('2023001', 'John Doe', '081234567890', 'john.doe@example.com', '2023-01-01'),
('2023002', 'Jane Smith', '081298765432', 'jane.smith@example.com', '2023-02-15'),
('2023003', 'Alice Johnson', '081234598765', 'alice.johnson@example.com', '2023-03-10'),
('2023004', 'Bob Brown', '081234567812', 'bob.brown@example.com', '2023-04-20'),
('2023005', 'Charlie Davis', '081234598712', 'charlie.davis@example.com', '2023-05-25'),
('2023006', 'David Evans', '081234567845', 'david.evans@example.com', '2023-06-30'),
('2023007', 'Eve Foster', '081234598734', 'eve.foster@example.com', '2023-07-18'),
('2023008', 'Frank Green', '081234567891', 'frank.green@example.com', '2023-08-22'),
('2023009', 'Grace Hill', '081234598756', 'grace.hill@example.com', '2023-09-14'),
('2023010', 'Hannah Ivy', '081234567823', 'hannah.ivy@example.com', '2023-10-05');

-- Insert data into products table
INSERT INTO products (product_id, product_name, price, stock) VALUES
('0124001', 'Rice', 50000.00, 100),
('0124002', 'Cooking Oil', 30000.00, 200),
('0124003', 'Sugar', 25000.00, 150),
('0124004', 'Shampoo', 15000.00, 75),
('0124005', 'Toothpaste', 10000.00, 50),
('0124006', 'Detergent', 20000.00, 60),
('0124007', 'Dishwashing Liquid', 18000.00, 80),
('0124008', 'Bread', 12000.00, 90),
('0124009', 'Milk', 15000.00, 110),
('0124010', 'Coffee', 20000.00, 120);

-- Insert data into sales table
INSERT INTO sales (sale_id, product_id, member_id, sale_date, quantity, selling_price, total_price) VALUES
('001', '0124001', '2023001', '2024-06-22 10:30:00', 1, 50000.00, 50000.00),
('002', '0124002', '2023002', '2024-06-22 11:00:00', 2, 30000.00, 60000.00),
('003', '0124003', '2023003', '2024-06-23 14:45:00', 1, 25000.00, 25000.00),
('004', '0124004', '2023004', '2024-06-23 15:00:00', 1, 15000.00, 15000.00),
('005', '0124005', '2023005', '2024-06-24 09:30:00', 1, 10000.00, 10000.00),
('006', '0124006', '2023006', '2024-06-24 10:45:00', 1, 20000.00, 20000.00),
('007', '0124007', '2023007', '2024-06-25 11:15:00', 1, 18000.00, 18000.00),
('008', '0124008', '2023008', '2024-06-25 12:30:00', 2, 12000.00, 24000.00),
('009', '0124009', '2023009', '2024-06-26 13:00:00', 1, 15000.00, 15000.00),
('010', '0124010', '2023010', '2024-06-26 14:30:00', 1, 20000.00, 20000.00);

