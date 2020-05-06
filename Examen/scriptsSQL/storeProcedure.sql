#AgregarLugar
DELIMITER $$
CREATE PROCEDURE AgregarLugar(
	IN nom varchar (255)
)
BEGIN 
	INSERT INTO lugar (nombre) VALUES (nom);
END $$
DELIMITER ;
####################################################
#Agregar Incidente No se Utiliza en Zombi
DELIMITER $$
CREATE PROCEDURE AgregarIncidente(
	IN nom varchar (255)
)
BEGIN 
	INSERT INTO incidente (nombre) VALUES (nom);
END $$
DELIMITER ;
####################################################
# Agregar Historial
DELIMITER $$
CREATE PROCEDURE AgregarHistorial(
	IN lugar int (10),
	IN incidente int (10)
)
BEGIN
	INSERT INTO historial (id_lugar, id_incidente) VALUES (lugar, incidente);
END $$
DELIMITER ;
####################################################
#Obtner el historial de incidente y fecha de cada lugar
DELIMITER $$
CREATE PROCEDURE ObtenerHistorial(
	IN id int (10)
)
BEGIN 
	Select E.nombre as E_nombre, H.fecha as H_fecha
	FROM incidente as E, lugar as Z, historial as H
	WHERE E.id = H.id_incidente AND Z.id = H.id_lugar AND H.id_lugar = id
    ORDER BY H.fecha DESC;
END $$
DELIMITER ;
####################################################
#Obtener Lugares 
DELIMITER $$
CREATE PROCEDURE ObtenerLugar()
BEGIN 
	Select Z.id as Z_id, Z.nombre as Z_nombre
	FROM lugar as Z;
END $$
DELIMITER ;
####################################################
#Obtener incidentes 
DELIMITER $$
CREATE PROCEDURE ObtenerEstatus()
BEGIN 
	Select E.id as E_id, E.nombre as E_nombre
	FROM incidente as E;
END $$
DELIMITER ;
####################################################
#Count de cuantos estan en el mismo estatus actual 
#param id_estatus
DELIMITER $$
CREATE PROCEDURE ObtenerUltimoEstatus(
	IN id int (10)
)
BEGIN 
	Select COUNT(E.Id) as Contar
	FROM incidente as E, lugar as Z, historial as H
	WHERE E.id = H.id_incidente AND Z.id = H.id_lugar AND E.id = id
    ORDER BY H.fecha DESC
    LIMIT 1;
END $$
DELIMITER ;
####################################################
#Todo historial en orden por evento
DELIMITER $$
CREATE PROCEDURE ObtenerTodoHistorial()
BEGIN 
	Select Z.nombre as Z_nombre, E.nombre as E_nombre, H.fecha as H_fecha
	FROM incidente as E, lugar as Z, historial as H
	WHERE E.id = H.id_incidente AND Z.id = H.id_lugar
    ORDER BY H.fecha DESC;
END $$
DELIMITER ;
####################################################
#Todo historial en orden por evento
DELIMITER $$
CREATE PROCEDURE ObtenerTodoLugar(
	IN id int (10)
)
BEGIN 
	Select Z.nombre as Z_nombre, E.nombre as E_nombre, H.fecha as H_fecha
	FROM incidente as E, lugar as Z, historial as H
	WHERE E.id = H.id_incidente AND Z.id = H.id_lugar AND Z.id = id
    ORDER BY H.fecha DESC;
END $$
DELIMITER ;
####################################################
#Todo historial con parametro del estatus actual
DELIMITER $$
CREATE PROCEDURE ObtenerBusquedaHistorial(
	IN id_incidente int (10)
)
BEGIN 
	Select Z.nombre as Z_nombre, E.nombre as E_nombre, H.fecha as H_fecha
	FROM incidente as E, lugar as Z, historial as H
	WHERE E.id = H.id_incidente AND Z.id = H.id_lugar AND H.id_incidente = id_incidente
    ORDER BY H.fecha DESC;
END $$
DELIMITER ;
####################################################
#Obtner el numero de incidentes de cada incidente juntando su historial
DELIMITER $$
CREATE PROCEDURE ObtenerNumeroincidente(
	IN id_incidente int (10)
)
BEGIN 
	Select COUNT(E.id) as Contar
	FROM incidente as E, lugar as Z, historial as H
	WHERE E.id = H.id_incidente AND Z.id = H.id_lugar AND H.id_incidente = id_incidente
    ORDER BY H.fecha DESC;
END $$
DELIMITER ;
####################################################
#Contar Lugares
DELIMITER $$
CREATE PROCEDURE ContarLugares()
BEGIN 
	Select COUNT(Z.Id) as Contar
	FROM lugar as Z;
END $$
DELIMITER ;


