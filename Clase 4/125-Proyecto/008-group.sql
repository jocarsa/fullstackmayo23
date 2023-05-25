SELECT 

entradas.texto AS 'texto de la entrada',
entradas.fecha AS 'fecha de la entrada',
clientes.nombrecompleto AS 'nombre del cliente',
COUNT(clientes.nombrecompleto) AS 'numero',
clientes.correo AS 'correo del cliente'

FROM `entradas`

LEFT JOIN clientes
ON entradas.FK_clientes_nombrecompleto = clientes.Identificador

WHERE clientes.nombrecompleto = 'flor'
GROUP BY clientes.nombrecompleto
ORDER BY entradas.fecha DESC