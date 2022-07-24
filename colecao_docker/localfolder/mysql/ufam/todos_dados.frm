TYPE=VIEW
query=select `c`.`id_cultura` AS `id_cultura`,`c`.`id_especie_cultura` AS `id_especie_cultura`,`c`.`id_meio_cultura` AS `id_meio_cultura`,`c`.`n_dpua_cultura` AS `n_dpua_cultura`,`c`.`codigo_col_ext_cultura` AS `codigo_col_ext_cultura`,`c`.`autor_cultura` AS `autor_cultura`,`c`.`metodo_preservacao_cultura` AS `metodo_preservacao_cultura`,`c`.`cultura_descartada_cultura` AS `cultura_descartada_cultura`,`c`.`n_cul_preser_oleo_cultura` AS `n_cul_preser_oleo_cultura`,`c`.`n_cul_preser_agua_cultura` AS `n_cul_preser_agua_cultura`,`c`.`data_preser_oleo_cultura` AS `data_preser_oleo_cultura`,`c`.`data_preser_agua_cultura` AS `data_preser_agua_cultura`,`c`.`depositante_cultura` AS `depositante_cultura`,`c`.`historico_deposito_cultura` AS `historico_deposito_cultura`,`c`.`forma_envio_cultura` AS `forma_envio_cultura`,`c`.`restricao_cultura` AS `restricao_cultura`,`c`.`status_cultura` AS `status_cultura`,`c`.`observacao_cultura` AS `observacao_cultura`,`c`.`loc_cidade_cultura` AS `loc_cidade_cultura`,`ufam`.`especie`.`id_especie` AS `id_especie`,`ufam`.`especie`.`nome_especie` AS `nome_especie`,`ufam`.`especie`.`status_tax_especie` AS `status_tax_especie`,`ufam`.`especie`.`tipos_org_especie` AS `tipos_org_especie`,`ufam`.`especie`.`aplicacoes_especie` AS `aplicacoes_especie`,`ufam`.`especie`.`procedencia_especie` AS `procedencia_especie`,`ufam`.`especie`.`substrato_especie` AS `substrato_especie`,`ufam`.`especie`.`riscos_especie` AS `riscos_especie`,`ufam`.`meio_cultivo`.`id_meio_cultivo` AS `id_meio_cultivo`,`ufam`.`meio_cultivo`.`meio_cultivo` AS `meio_cultivo`,`ufam`.`cidades`.`id_cidades` AS `id_cidades`,`ufam`.`cidades`.`nome_cidades` AS `nome_cidades`,`ufam`.`cidades`.`id_estado_cidade` AS `id_estado_cidade`,`ufam`.`estados`.`id_estados` AS `id_estados`,`ufam`.`estados`.`nome_estados` AS `nome_estados`,`ufam`.`estados`.`sigla_estados` AS `sigla_estados`,`ufam`.`estados`.`id_pais_estados` AS `id_pais_estados`,`ufam`.`pais`.`id_pais` AS `id_pais`,`ufam`.`pais`.`nome_pt_pais` AS `nome_pt_pais`,`ufam`.`pais`.`nome_eng_pais` AS `nome_eng_pais` from (((((`ufam`.`cultura` `c` join `ufam`.`especie` on(`c`.`id_especie_cultura` = `ufam`.`especie`.`id_especie`)) join `ufam`.`meio_cultivo` on(`c`.`id_meio_cultura` = `ufam`.`meio_cultivo`.`id_meio_cultivo`)) join `ufam`.`cidades` on(`ufam`.`cidades`.`id_cidades` = `c`.`loc_cidade_cultura`)) join `ufam`.`estados` on(`ufam`.`estados`.`id_estados` = `ufam`.`cidades`.`id_estado_cidade`)) join `ufam`.`pais` on(`ufam`.`pais`.`id_pais` = `ufam`.`estados`.`id_pais_estados`))
md5=331ae0fef2e4d5b43ab4b2faab5d1637
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=1
with_check_option=0
timestamp=2022-07-23 22:54:28
create-version=2
source=SELECT `c`.`id_cultura` AS `id_cultura`, `c`.`id_especie_cultura` AS `id_especie_cultura`, `c`.`id_meio_cultura` AS `id_meio_cultura`, `c`.`n_dpua_cultura` AS `n_dpua_cultura`, `c`.`codigo_col_ext_cultura` AS `codigo_col_ext_cultura`, `c`.`autor_cultura` AS `autor_cultura`, `c`.`metodo_preservacao_cultura` AS `metodo_preservacao_cultura`, `c`.`cultura_descartada_cultura` AS `cultura_descartada_cultura`, `c`.`n_cul_preser_oleo_cultura` AS `n_cul_preser_oleo_cultura`, `c`.`n_cul_preser_agua_cultura` AS `n_cul_preser_agua_cultura`, `c`.`data_preser_oleo_cultura` AS `data_preser_oleo_cultura`, `c`.`data_preser_agua_cultura` AS `data_preser_agua_cultura`, `c`.`depositante_cultura` AS `depositante_cultura`, `c`.`historico_deposito_cultura` AS `historico_deposito_cultura`, `c`.`forma_envio_cultura` AS `forma_envio_cultura`, `c`.`restricao_cultura` AS `restricao_cultura`, `c`.`status_cultura` AS `status_cultura`, `c`.`observacao_cultura` AS `observacao_cultura`, `c`.`loc_cidade_cultura` AS `loc_cidade_cultura`, `especie`.`id_especie` AS `id_especie`, `especie`.`nome_especie` AS `nome_especie`, `especie`.`status_tax_especie` AS `status_tax_especie`, `especie`.`tipos_org_especie` AS `tipos_org_especie`, `especie`.`aplicacoes_especie` AS `aplicacoes_especie`, `especie`.`procedencia_especie` AS `procedencia_especie`, `especie`.`substrato_especie` AS `substrato_especie`, `especie`.`riscos_especie` AS `riscos_especie`, `meio_cultivo`.`id_meio_cultivo` AS `id_meio_cultivo`, `meio_cultivo`.`meio_cultivo` AS `meio_cultivo`, `cidades`.`id_cidades` AS `id_cidades`, `cidades`.`nome_cidades` AS `nome_cidades`, `cidades`.`id_estado_cidade` AS `id_estado_cidade`, `estados`.`id_estados` AS `id_estados`, `estados`.`nome_estados` AS `nome_estados`, `estados`.`sigla_estados` AS `sigla_estados`, `estados`.`id_pais_estados` AS `id_pais_estados`, `pais`.`id_pais` AS `id_pais`, `pais`.`nome_pt_pais` AS `nome_pt_pais`, `pais`.`nome_eng_pais` AS `nome_eng_pais` FROM (((((`cultura` `c` join `especie` on(`c`.`id_especie_cultura` = `especie`.`id_especie`)) join `meio_cultivo` on(`c`.`id_meio_cultura` = `meio_cultivo`.`id_meio_cultivo`)) join `cidades` on(`cidades`.`id_cidades` = `c`.`loc_cidade_cultura`)) join `estados` on(`estados`.`id_estados` = `cidades`.`id_estado_cidade`)) join `pais` on(`pais`.`id_pais` = `estados`.`id_pais_estados`))
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_general_ci
view_body_utf8=select `c`.`id_cultura` AS `id_cultura`,`c`.`id_especie_cultura` AS `id_especie_cultura`,`c`.`id_meio_cultura` AS `id_meio_cultura`,`c`.`n_dpua_cultura` AS `n_dpua_cultura`,`c`.`codigo_col_ext_cultura` AS `codigo_col_ext_cultura`,`c`.`autor_cultura` AS `autor_cultura`,`c`.`metodo_preservacao_cultura` AS `metodo_preservacao_cultura`,`c`.`cultura_descartada_cultura` AS `cultura_descartada_cultura`,`c`.`n_cul_preser_oleo_cultura` AS `n_cul_preser_oleo_cultura`,`c`.`n_cul_preser_agua_cultura` AS `n_cul_preser_agua_cultura`,`c`.`data_preser_oleo_cultura` AS `data_preser_oleo_cultura`,`c`.`data_preser_agua_cultura` AS `data_preser_agua_cultura`,`c`.`depositante_cultura` AS `depositante_cultura`,`c`.`historico_deposito_cultura` AS `historico_deposito_cultura`,`c`.`forma_envio_cultura` AS `forma_envio_cultura`,`c`.`restricao_cultura` AS `restricao_cultura`,`c`.`status_cultura` AS `status_cultura`,`c`.`observacao_cultura` AS `observacao_cultura`,`c`.`loc_cidade_cultura` AS `loc_cidade_cultura`,`ufam`.`especie`.`id_especie` AS `id_especie`,`ufam`.`especie`.`nome_especie` AS `nome_especie`,`ufam`.`especie`.`status_tax_especie` AS `status_tax_especie`,`ufam`.`especie`.`tipos_org_especie` AS `tipos_org_especie`,`ufam`.`especie`.`aplicacoes_especie` AS `aplicacoes_especie`,`ufam`.`especie`.`procedencia_especie` AS `procedencia_especie`,`ufam`.`especie`.`substrato_especie` AS `substrato_especie`,`ufam`.`especie`.`riscos_especie` AS `riscos_especie`,`ufam`.`meio_cultivo`.`id_meio_cultivo` AS `id_meio_cultivo`,`ufam`.`meio_cultivo`.`meio_cultivo` AS `meio_cultivo`,`ufam`.`cidades`.`id_cidades` AS `id_cidades`,`ufam`.`cidades`.`nome_cidades` AS `nome_cidades`,`ufam`.`cidades`.`id_estado_cidade` AS `id_estado_cidade`,`ufam`.`estados`.`id_estados` AS `id_estados`,`ufam`.`estados`.`nome_estados` AS `nome_estados`,`ufam`.`estados`.`sigla_estados` AS `sigla_estados`,`ufam`.`estados`.`id_pais_estados` AS `id_pais_estados`,`ufam`.`pais`.`id_pais` AS `id_pais`,`ufam`.`pais`.`nome_pt_pais` AS `nome_pt_pais`,`ufam`.`pais`.`nome_eng_pais` AS `nome_eng_pais` from (((((`ufam`.`cultura` `c` join `ufam`.`especie` on(`c`.`id_especie_cultura` = `ufam`.`especie`.`id_especie`)) join `ufam`.`meio_cultivo` on(`c`.`id_meio_cultura` = `ufam`.`meio_cultivo`.`id_meio_cultivo`)) join `ufam`.`cidades` on(`ufam`.`cidades`.`id_cidades` = `c`.`loc_cidade_cultura`)) join `ufam`.`estados` on(`ufam`.`estados`.`id_estados` = `ufam`.`cidades`.`id_estado_cidade`)) join `ufam`.`pais` on(`ufam`.`pais`.`id_pais` = `ufam`.`estados`.`id_pais_estados`))
mariadb-version=100505