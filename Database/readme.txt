Denah Database

Table Name: User
Keterangan: digunakan pada keseluruhan fungsionalitas yang melibatkan user seperti pada fitur Login, Register, dll.
---
user_id, varchar(64) primary key
username, varchar(32)
email, varchar(32)
password, varchar(32)
created_timestamp, date()       <--- secure implementation
login_timestamp, date()         <--- secure implementation
pass_change_timestamp, date()   <--- secure implementation
role, enum("admin", "customer", "engineer")
---

Table Name: Security Job
Keterangan: digunakan sebagai peng-kategorian jasa pentester yang beragam
---
job_id, varchar(64), primary key
name, varchar(128)
user_id, varchar(64), foreign key
category, enum("Red Team", "Blue Team", "Forensic", "Pentester", "Code Audit", "CTF Player", "Recruiter")
---

Table Name: User Detail
Keterangan: digunakan sebagai informasi lengkap untuk user
Feature Action: edit
---
user_id, varchar(64) primary key
nama_lengkap, varchar(128)
no_hp, varchar(16)
tgl_lahir, date()
alamat, varchar(128)
link_porto, varchar(128),
dir_profile_photo, varchar(128)    <--- direktori/link foto profile di local/remote storage
edit_change_timestamp, date()      <--- secure implementation
job_id, varchar(64), foreign key
---

