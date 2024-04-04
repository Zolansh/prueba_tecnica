create database alenkaprueba
use alenkaprueba

create table paciente(
    idpaciente int auto_increment not null primary key,
    nombres varchar(30) not null,
    apellidos varchar(30) not null,
    dni char(8) not null,
    fecha_nacimiento date not null

);

create table examen(
    idexamen int auto_increment not null primary key,
    descripcion varchar(30) not null
)