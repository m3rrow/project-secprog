CREATE DATABASE secprog;

CREATE TABLE secprog.user (
    user_id VARCHAR(64) PRIMARY KEY NOT NULL,
    username VARCHAR(32) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- Login timestamp automatically updates when row is modified
    login_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    pass_change_timestamp TIMESTAMP NULL,
    role ENUM("admin", "customer", "freelancer") NOT NULL
);

CREATE TABLE secprog.user_detail (
    user_id VARCHAR(64) PRIMARY KEY NOT NULL,
    nama_lengkap VARCHAR(255),
    no_hp VARCHAR(16),
    tgl_lahir DATE,
    alamat VARCHAR(255),
    link_porto VARCHAR(255),
    link_profile_photo VARCHAR(255),
    edit_change_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    verified_status BOOLEAN NOT NULL DEFAULT FALSE,
    CONSTRAINT fk_user_detail_user FOREIGN KEY (user_id) REFERENCES secprog.user(user_id) ON DELETE CASCADE
);

CREATE TABLE secprog.user_wallet (
    wallet_id VARCHAR(64) PRIMARY KEY NOT NULL,
    balance DECIMAL(15, 2) NOT NULL DEFAULT 0.00,

    user_id VARCHAR(64) NOT NULL UNIQUE,
    CONSTRAINT fk_wallet_user FOREIGN KEY (user_id) REFERENCES secprog.user_detail(user_id) ON DELETE CASCADE
);

CREATE TABLE secprog.jobs (
    job_id VARCHAR(64) PRIMARY KEY NOT NULL,
    name varchar(128),
    job_desc TEXT,
    link_job_photo VARCHAR(255),
    price_per_hour DECIMAL(15, 2) NOT NULL DEFAULT 0.00,
    hire_time DATE,
    category ENUM("Red Team", "Blue Team", "Forensic", "Pentester", "Code Audit", "CTF Player", "Recruiter") NOT NULL,

    user_id VARCHAR(64),
    CONSTRAINT fk_user_job FOREIGN KEY (user_id) REFERENCES secprog.user_detail(user_id) ON DELETE CASCADE
);

CREATE TABLE secprog.job_order (
    order_id INT PRIMARY KEY AUTO_INCREMENT,

    duration_hours INT UNSIGNED NULL,
    order_note VARCHAR(255),
    job_status ENUM("On Progress", "Complete", "Waiting Order") NOT NULL,

    job_id VARCHAR(64),
    recruiter_id VARCHAR(64),
    freelancer_id VARCHAR(64),
    FOREIGN KEY (job_id) REFERENCES secprog.jobs(job_id) ON DELETE CASCADE,
    CONSTRAINT fk_job_recruiter FOREIGN KEY (recruiter_id) REFERENCES secprog.user(user_id),
    CONSTRAINT fk_job_freelancer FOREIGN KEY (freelancer_id) REFERENCES secprog.user(user_id)
);

CREATE TABLE secprog.job_ratings (
    rating_id INT PRIMARY KEY AUTO_INCREMENT,
    rating_score TINYINT UNSIGNED NOT NULL,
    comment TEXT,
    created_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    reviwer_id VARCHAR(64),
    reviwer_job VARCHAR(64),
    FOREIGN KEY (reviwer_id) REFERENCES secprog.user_detail(user_id) ON DELETE CASCADE,
    FOREIGN KEY (reviwer_job) REFERENCES secprog.jobs(job_id) ON DELETE CASCADE
);
