
#Tabla Lugar
create table if not exists lugar(
	id int (10) not null auto_increment,
    nombre varchar(255) not null,
    primary key (id)
);


#Tabla Incidente
create table if not exists incidente(
	id int (10) not null auto_increment,
    nombre varchar(255) not null,
    primary key (id)
    );

#Tabla Historial Relacion

create table if not exists historial(
	id int (10) not null auto_increment,
    fecha timestamp default current_timestamp,
    id_lugar int (10),
    id_incidente int (10),
    primary key (id),
    foreign key (id_lugar) references lugar (id) on DELETE set null,
    foreign key (id_incidente) references incidente (id) on DELETE set null
    );
    
    use dawbdorg_A01209043;