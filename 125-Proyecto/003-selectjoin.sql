SELECT 
entradas.texto,
entradas.fecha,
clientes.nombrecompleto,
clientes.correo
FROM `entradas` 
LEFT JOIN clientes
ON entradas.FK_clientes_nombrereal = clientes.Identificador
