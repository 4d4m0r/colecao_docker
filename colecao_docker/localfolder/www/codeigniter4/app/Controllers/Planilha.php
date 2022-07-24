<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\CulturaModel;
use App\Models\EspecieModel;
use App\Models\MeioModel;
use App\Models\CidadeModel;

use PhpOffice\PhpSpreadsheet\Spreadsheet;

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xls;

class Planilha extends BaseController
{
    public function data($data){
        //dd($data);
        $dat = str_replace('/', '-', $data);
        $newdate = strtotime($dat);
        //dd($newdate);
        $newformat = date('Y-m-d',$newdate);
        return $newformat;
        //return date("Y-m-d", strtotime($data));
    }
    public function export(){
        $planilha_object = new CulturaModel();

        $data  = $planilha_object->getDadosCultura();

        $nome_planilha = 'tabela_colecao.xlsx';

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No DPUA');
        $sheet->setCellValue('B1', 'No de coleção externa');
        $sheet->setCellValue('C1', 'Procedência');
        $sheet->setCellValue('D1', 'Espécie');
        $sheet->setCellValue('E1', 'Autor');

        $sheet->setCellValue('F1', 'Status Taxonômico');
        $sheet->setCellValue('G1', 'Meio Cultivo');
        $sheet->setCellValue('H1', 'Método Preservação');
        $sheet->setCellValue('I1', 'Cultura Descartada');

        $sheet->setCellValue('J1', 'No Cultura Preservada em óleo');
        $sheet->setCellValue('K1', 'No Cultura Preservada em água');
        $sheet->setCellValue('L1', 'Data preservação em óleo');
        $sheet->setCellValue('M1', 'Data preservação em água');

        $sheet->setCellValue('N1', 'Depositante');
        $sheet->setCellValue('O1', 'Histórico do depósito');
        $sheet->setCellValue('P1', 'Tipos de organismo');

        $sheet->setCellValue('Q1', 'Substrato');
        $sheet->setCellValue('R1', 'Município');
        $sheet->setCellValue('S1', 'Estado');
        $sheet->setCellValue('T1', 'País');
        $sheet->setCellValue('U1', 'Restrições');
        $sheet->setCellValue('V1', 'Risco biológico');
        $sheet->setCellValue('W1', 'Aplicações');
        $sheet->setCellValue('X1', 'Forma de envio');
        $sheet->setCellValue('Y1', 'Observações');


        $count = 2;

        foreach($data as $row){
            $sheet->setCellValue('A' . $count, $row['n_dpua_cultura']);
			$sheet->setCellValue('B' . $count, $row['codigo_col_ext_cultura']);
			$sheet->setCellValue('C' . $count, $row['procedencia_especie']);
			$sheet->setCellValue('D' . $count, $row['nome_especie']);
            $sheet->setCellValue('E' . $count, $row['autor_cultura']);

            $sheet->setCellValue('F' . $count, $row['status_tax_especie']);
			$sheet->setCellValue('G' . $count, $row['meio_cultivo']);
			$sheet->setCellValue('H' . $count, $row['metodo_preservacao_cultura']);
			$sheet->setCellValue('I' . $count, $row['cultura_descartada_cultura']);

            $sheet->setCellValue('J' . $count, $row['n_cul_preser_oleo_cultura']);
			$sheet->setCellValue('K' . $count, $row['n_cul_preser_agua_cultura']);
			$sheet->setCellValue('L' . $count, $row['data_preser_oleo_cultura']);
			$sheet->setCellValue('M' . $count, $row['data_preser_agua_cultura']);

            $sheet->setCellValue('N' . $count, $row['depositante_cultura']);
			$sheet->setCellValue('O' . $count, $row['historico_deposito_cultura']);
			$sheet->setCellValue('P' . $count, $row['tipos_org_especie']);

            $sheet->setCellValue('Q' . $count, $row['substrato_especie']);
			$sheet->setCellValue('R' . $count, $row['nome_cidades']);
			$sheet->setCellValue('S' . $count, $row['nome_estados']);
            $sheet->setCellValue('T' . $count, $row['nome_pt_pais']);
			$sheet->setCellValue('U' . $count, $row['restricao_cultura']);
			$sheet->setCellValue('V' . $count, $row['riscos_especie']);
            $sheet->setCellValue('W' . $count, $row['aplicacoes_especie']);
			$sheet->setCellValue('X' . $count, $row['forma_envio_cultura']);
            $sheet->setCellValue('Y' . $count, $row['observacao_cultura']);
			

			$count++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($nome_planilha);

        header("Content-Type: application/vnd.ms-excel");

		header('Content-Disposition: attachment; filename="' . basename($nome_planilha) . '"');

		header('Expires: 0');

		header('Cache-Control: must-revalidate');

		header('Pragma: public');

		header('Content-Length:' . filesize($nome_planilha));

		flush();

		readfile($nome_planilha);

		exit;
    }
    public function import(){
        $meioModel = new MeioModel();
        $especieModel = new EspecieModel();
        $culturaModel = new CulturaModel();
        $cidadeModel = new CidadeModel();

        $upload_file = $_FILES['upload_file']['name'];
        $extension=pathinfo($upload_file,PATHINFO_EXTENSION);

        if($extension == 'csv'){
            $reader = new Csv();
        }else if($extension == 'xls'){
            $reader = new Xls();
        }else{
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        $spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
        $sheetdata=$spreadsheet->getActiveSheet()->toArray();
        $sheetcount=count($sheetdata);

        if($sheetcount>1){
            for ($i=1; $i < $sheetcount; $i++) {               
                $dpua = $sheetdata[$i][0];
                $col_ext = $sheetdata[$i][1];
                $procedencia = $sheetdata[$i][2];
                $especie = $sheetdata[$i][3];
                $autor = $sheetdata[$i][4];
                $status_tax = $sheetdata[$i][5];
                $meio = $sheetdata[$i][6];
                $metodo = $sheetdata[$i][7];
                $cultura_desc = $sheetdata[$i][8];
                $n_cult_pre_oleo = $sheetdata[$i][9];
                $n_cult_pre_agua = $sheetdata[$i][10];
                $data_oleo = $sheetdata[$i][11];
                $data_agua = $sheetdata[$i][12];
                $depositante = $sheetdata[$i][13];
                $historico = $sheetdata[$i][14];
                $tipo_org = $sheetdata[$i][15];
                $substrato = $sheetdata[$i][16];
                $municipio = $sheetdata[$i][17];
                $estado = $sheetdata[$i][18];
                $status = $sheetdata[$i][20];
                $risco = $sheetdata[$i][21];
                $aplicacoes = $sheetdata[$i][22];
                $forma_envio = $sheetdata[$i][23];
                $observacoes = $sheetdata[$i][24];
                $restricoes = 0;

                //Verifica se já existe algum meio de cultivo presente no excel antes de realizar a inserção
                $data_meio=array(
                    'meio_cultivo'=>$meio
                );
                $verificaMeio = $meioModel->verificaExisteMeio($data_meio['meio_cultivo']);

                if($verificaMeio == true){
                    $meioModel->save($data_meio);
                }

                //Verifica se já existe alguma espécie presente no excel antes de realizar a inserção
                $data_especie=array(
                    'nome_especie' => $especie,
                    'status_tax_especie' => $status_tax,
                    'tipos_org_especie' => $tipo_org,
                    'procedencia_especie' => $procedencia,
                    'substrato_especie' => $substrato,
                    'riscos_especie' => $risco,
                    'aplicacoes_especie' => $aplicacoes
                );
                $verificaEspecie = $especieModel->verificaExisteEspecie($data_especie);
                if($verificaEspecie == true){
                    $especieModel->save($data_especie);
                }

                //Verifica se já existe alguma cultura presente no excel antes de realizar a inserção
                $data_cultura=array(
                    'n_dpua_cultura'=> $dpua
                );
                $verificaCultura = $culturaModel->verificaExisteCultura($data_cultura);
                if($verificaCultura == true){

                    //Recuperar id meio
                    $arrayMeio = $meioModel->getIdMeio($meio);
                    $idMeio = intval($arrayMeio[0]['id_meio_cultivo']);

                    //Recuperar id da especie
                    $arrayEspecie = $especieModel->getIdEspecie($especie);
                    $idEspecie = intval($arrayEspecie[0]['id_especie']);

                    //recuperar id da localizacao
                    $arrayCidade = $cidadeModel->getIdCidade($municipio,$estado);
                    $idCidade = intval($arrayCidade[0]['id_cidades']);

                    //Atualizar o data_cultura
                    $data_cultura=array(
                        'id_especie_cultura' => $idEspecie,
                        'id_meio_cultura'=> $idMeio,
                        'n_dpua_cultura'=> $dpua,
                        'codigo_col_ext_cultura'=> $col_ext,
                        'autor_cultura'=> $autor,
                        'metodo_preservacao_cultura'=> $metodo,
                        'cultura_descartada_cultura'=> $cultura_desc,
                        'n_cul_preser_oleo_cultura'=> $n_cult_pre_oleo,
                        'n_cul_preser_agua_cultura'=> $n_cult_pre_agua,
                        'data_preser_oleo_cultura'=> $this->data($data_oleo),
                        'data_preser_agua_cultura'=> $this->data($data_agua),
                        'depositante_cultura'=> $depositante,
                        'historico_deposito_cultura'=> $historico,
                        'forma_envio_cultura'=> $forma_envio,
                        'restricao_cultura'=> $restricoes,
                        'status_cultura'=> $status,
                        'observacao_cultura'=> $observacoes,
                        'loc_cidade_cultura'=> $idCidade
                    );
                    $culturaModel->save($data_cultura);
                }
            }
            return redirect()->route('dashboard');
        }
    }
}
