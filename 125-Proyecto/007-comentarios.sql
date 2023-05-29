SELECT                                                          Quiero seleccionar

entradas.texto AS 'texto de la entrada',                        columna AS como se va a llamar
entradas.fecha AS 'fecha de la entrada',                        columna AS como se va a llamar
clientes.nombrecompleto AS 'nombre del cliente',                columna AS como se va a llamar
clientes.correo AS 'correo del cliente'                         columna AS como se va a llamar

FROM `entradas`                                                 de que tabla lo voy a seleccionar

LEFT JOIN clientes                                              con que otra tabla lo voy a cruzar
ON entradas.FK_clientes_nombrecompleto = clientes.Identificador cual es el criterio de cruce

WHERE clientes.nombrecompleto = 'flor'                          condiciones de búsqueda                

ORDER BY entradas.fecha DESC                                    criterios de ordenación
GROUP BY clientes.nombrecompleto                                criterio de agrupación