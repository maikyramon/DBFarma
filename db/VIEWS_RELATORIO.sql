
CREATE VIEW VW_RELATORIO1 AS (
SELECT t.cgctrs, t.nomtrs, t.datcadtrs FROM transacionador t
INNER JOIN tipo_transacionador p ON t.codtiptrs = p.codtiptrs
WHERE t.sextrs = 'F' AND
p.tiptrs = 'C'
ORDER BY nomtrs DESC);


CREATE VIEW VW_RELATORIO2 AS ( 
SELECT p.codpro, p.nompro, p.valvenpro FROM produto p
INNER JOIN categoria c ON p.codcat = c.codcat
WHERE extract(YEAR FROM datcadpro) = 2017 AND
valvenpro > 100 AND
c.codcat = 6
ORDER BY nompro ASC);


CREATE VIEW VW_RELATORIO3 AS (
SELECT EXTRACT(MONTH FROM v.datven) AS mes, count(v.*) AS qtd, sum(valtotven) as val FROM venda v
INNER JOIN venda_item i ON i.codven = v.codven
INNER JOIN transacionador t ON t.cgctrs = v.cgctrs
WHERE i.valdesitm > 0 AND
extract(YEAR FROM v.datven) = 2016 AND
sextrs = 'M'
GROUP BY mes);


CREATE VIEW VW_RELATORIO4 AS (
SELECT t.cgctrs, v.codven, v.datven, v.valtotven FROM venda v
INNER JOIN transacionador t ON t.cgctrs = v.cgctrs
WHERE (upper(t.cidtrs) like ('MARAVILHA') OR
upper(t.cidtrs) like ('DESCANÇO')) AND
mod(cast(EXTRACT(MONTH FROM v.datven)as integer), 2) > 0
ORDER BY datven DESC);