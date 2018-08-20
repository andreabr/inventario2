<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectors', function (Blueprint $table) {
            $table->increments('id');

            $table->string('initials', 10);
            $table->string('in_full', 100);
            $table->string('parent_sector', 3)->nullable();

            $table->softDeletesTz();
            $table->timestampsTz();
        });

        $sectors = array(
            array('initials' =>'CMDO', 'in_full' => 'Comando', 'parent_sector' => ''),
            array('initials' =>'SEC', 'in_full' => 'Secretaria', 'parent_sector' => '1'),
            array('initials' =>'SI', 'in_full' => 'Seção de Inteligência', 'parent_sector' => '1'),
            array('initials' =>'DA', 'in_full' => 'Divisão Administrativa', 'parent_sector' => '1'),
            array('initials' =>'ACI', 'in_full' => 'Assessoria de Controle Interno', 'parent_sector' => '1'),
            array('initials' =>'SCI', 'in_full' => 'Seção de Controle Interno', 'parent_sector' => '5'),
            array('initials' =>'SCS', 'in_full' => 'Seção de Comunicação Social', 'parent_sector' => '1'),
            array('initials' =>'OUV', 'in_full' => 'Ouvidoria', 'parent_sector' => '1'),
            array('initials' =>'DPI', 'in_full' => 'Divisão de Patrimônio Imóvel', 'parent_sector' => '1'),
            array('initials' =>'SPN', 'in_full' => 'Subdivisão de Próprios Nacionais', 'parent_sector' => '9'),
            array('initials' =>'SEI', 'in_full' => 'Subdivisão de Engenharia e Infraestrutura', 'parent_sector' => '9'),
            array('initials' =>'SCP', 'in_full' => 'Subdivisão de Cadastro Patrimonial', 'parent_sector' => '9'),
            array('initials' =>'SOP', 'in_full' => 'Subdivisão de Gestão Orçamentária e Patrimonial', 'parent_sector' => '4'),
            array('initials' =>'SGO', 'in_full' => 'Seção de Gestão Orçamentária',  'parent_sector' => '13'),
            array('initials' =>'SAP', 'in_full' => 'Subdivisão de Apoio', 'parent_sector' => '4'),
            array('initials' =>'SESO-AF', 'in_full' => 'Subdivisão de Serviço Social', 'parent_sector' => '1'),
            array('initials' =>'SPE', 'in_full' => 'Subdivisão de Pessoal','parent_sector' => '4'),
            array('initials' =>'SRG', 'in_full' => 'Seção de Registro', 'parent_sector' => '13'),
            array('initials' =>'SIJ', 'in_full' => 'Seção de Investigação e Justiça', 'parent_sector' => '15'),
            array('initials' =>'SPC', 'in_full' => 'Seção de Pessoal Civil', 'parent_sector' => '17'),
            array('initials' =>'SSD', 'in_full' => 'Seção de Segurança e Defesa', 'parent_sector' => '15'),
            array('initials' =>'SEF', 'in_full' => 'Seção de Educação Física', 'parent_sector' => '17'),
            array('initials' =>'CAP', 'in_full' => 'Central de Atendimento ao Permissionário', 'parent_sector' => '11'),
            array('initials' =>'SPJ', 'in_full' => 'Seção de Projetos', 'parent_sector' => '11'),
            array('initials' =>'CAP-B', 'in_full' => 'Central de Atendimento ao Permissionário da Vila Residencial da Barra da Tijuca', 'parent_sector' => '23'),
            array('initials' =>'CAP-J', 'in_full' => 'Central de Atendimento ao Permissionário da Vila Residencial de Jacarepaguá', 'parent_sector' => '23'),
            array('initials' =>'CAP-SC', 'in_full' => 'Central de Atendimento ao Permissionário da Vila Residencial de Santa Cruz', 'parent_sector' => '23'),
            array('initials' =>'SSG', 'in_full' => 'Seção de Serviços Gerais', 'parent_sector' => '11'),
            array('initials' =>'PIPAR', 'in_full' => 'Pagadoria de Inativos e Pensionistas','parent_sector' => '1'),
            array('initials' =>'CAP-A', 'in_full' => 'Central de Atendimento ao Permissionário das Vilas Residenciais dos Afonsos e Sulacap','parent_sector' => '23'),
            array('initials' =>'SAP-STAFF', 'in_full' => 'Subdivisão de Apoio - Sala de Staff','parent_sector' => '15'),
        );
    
        DB::table('sectors')->insert($sectors);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sectors');
    }
}
