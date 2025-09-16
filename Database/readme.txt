Denah Database

Table Name: User
Keterangan: digunakan pada keseluruhan fungsionalitas yang melibatkan user seperti pada fitur Login, Register, dll.
---
user_id, varchar(64) primary key
username, varchar(32)
email, varchar(32)
password, varchar(32)
no_hp, varchar(16)
alamat, varchar(128)
login_timestamp, date()         <--- secure implementation
pass_change_timestamp, date()   <--- secure implementation
role, enum("admin", "customer", "engineer")
job_id, varchar(64), primary key
---

Table Name: Security Job
Keterangan: digunakan sebagai peng-kategorian jasa pentester yang beragam
---
job_id, varchar(64), primary key
name, varchar(128)
user_id, varchar(64), foreign key
category, enum("Red Team", "Blue Team", "Forensic", "Pentester", "Code Audit", "CTF Player", "Recruiter")
---
