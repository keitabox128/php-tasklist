CREATE TABLE tasks (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    tasks_title VARCHAR(100),
    tasks_content VARCHAR(200),
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);