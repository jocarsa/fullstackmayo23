SELECT * FROM `entradas` 
LEFT JOIN clientes
ON entradas.FK_clientes_nombrereal = clientes.Identificador
