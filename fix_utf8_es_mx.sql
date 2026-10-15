-- Fix UTF-8 Español México para Café Dev
-- CHARSET utf8mb4 + COLLATE utf8mb4_spanish_ci (es-MX: ñ, á, é, í, ó, ú)
ALTER DATABASE cafe_dev_local CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
ALTER DATABASE cafe_dev_produccion CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;

USE cafe_dev_local;
ALTER TABLE productos CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
TRUNCATE TABLE productos;
INSERT INTO productos (nombre, precio) VALUES
('Café Americano', 35.00),
('Capuchino', 48.50),
('Muffin de Arándanos', 30.00);

USE cafe_dev_produccion;
ALTER TABLE productos CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
TRUNCATE TABLE productos;
INSERT INTO productos (nombre, precio) VALUES
('Café Americano', 35.00),
('Capuchino', 48.50),
('Muffin de Arándanos', 30.00);
