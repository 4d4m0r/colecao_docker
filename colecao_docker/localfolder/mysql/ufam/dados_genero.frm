TYPE=VIEW
query=select distinct `ufam`.`genero_especie`.`nome_genero` AS `nome_genero`,count(`ufam`.`genero_especie`.`nome_genero`) AS `count(nome_genero)` from `ufam`.`genero_especie` group by `ufam`.`genero_especie`.`nome_genero` having count(`ufam`.`genero_especie`.`nome_genero`) >= 0
md5=d365409845cae1a137276086a95d7191
updatable=0
algorithm=0
definer_user=root
definer_host=localhost
suid=1
with_check_option=0
timestamp=2022-07-23 22:54:28
create-version=2
source=SELECT DISTINCT `genero_especie`.`nome_genero` AS `nome_genero`, count(`genero_especie`.`nome_genero`) AS `count(nome_genero)` FROM `genero_especie` GROUP BY `genero_especie`.`nome_genero` HAVING count(`genero_especie`.`nome_genero`) >= 00
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_general_ci
view_body_utf8=select distinct `ufam`.`genero_especie`.`nome_genero` AS `nome_genero`,count(`ufam`.`genero_especie`.`nome_genero`) AS `count(nome_genero)` from `ufam`.`genero_especie` group by `ufam`.`genero_especie`.`nome_genero` having count(`ufam`.`genero_especie`.`nome_genero`) >= 0
mariadb-version=100505
