CREATE database hotel;

use hotel;
CREATE TABLE admin(
    admin_name VARCHAR(13) NOT NULL ,
    admin_pwd VARCHAR(13) NOT NULL ,
    name VARCHAR(7) NOT NULL ,
    phone VARCHAR(11) NOT NULL ,
    pow INT(3) NOT NULL ,
    id INT(7) AUTO_INCREMENT PRIMARY KEY,
    identity VARCHAR(18) UNIQUE
);


use hotel;
INSERT INTO admin (
    admin_name,
    admin_pwd,
    name,
    phone,
    identity,
    pow
) values (
    'admin',
    'admin',
    '����',
    '15344425342',
    '430381199411270458',
    1
);
