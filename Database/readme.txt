Dena Database

Login:
username/email, varchar(32)
password, varchar(32)
login_timestamp, date()

Register
uid, varchar(64) primary key
username, varchar(32)
email, varchar(32)
password, varchar(32)
no_hp, varchar(16)
alamat, varchar(128)
role, enum("admin", "customer, "seller")
register_timestamp, date()



