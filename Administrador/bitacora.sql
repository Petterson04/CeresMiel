use ceres
create table bitacora (Id INT AUTO_INCREMENT PRIMARY KEY, Usuario Varchar(100),fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP, consulta Varchar(100), contraconsulta Varchar(100));
delimiter//
CREATE PROCEDURE registrar_bitacora(
    in p_Usuario Varchar (100),
    IN p_consulta Varchar (100),
    IN p_contraconsulta Varchar(100)
    )
    begin 
        insert into bitacora (Usuario,consulta,contraconsulta) VALUES (p_Usuario,p_consulta,p_contraconsulta);
    END//

delimiter//

CREATE TRIGGER after_insertar_productos
before insert on productos 
for each row
begin
    call registrar_bitacora(
        USER(),
        concat('insert into productos VALUES (',NEW.ID_Producto,'',NEW.NombreProducto,'',NEW.Precio,'',NEW.Onzas,'',NEW.Imagen')'),'DELETE FROM productos WHERE Id_Producto=LAST_INSERT_Id_Procuto()'),
        END 
    