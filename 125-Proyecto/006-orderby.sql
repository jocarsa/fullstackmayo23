SELECT 

entradas.texto AS 'texto de la entrada',
entradas.fecha AS 'fecha de la entrada',
clientes.nombrecompleto AS 'nombre del cliente',
clientes.correo AS 'correo del cliente'

FROM `entradas`

LEFT JOIN clientes
ON entradas.FK_clientes_nombrereal = clientes.Identificador

WHERE clientes.nombrecompleto = 'flor'

ORDER BY entradas.fecha DESC