<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 20/05/2016
 * Time: 11:13
 */

namespace Agenda\Model;

class Grupo
{
    public $id_grupo;
    public $nome;
    public $descricao;
    public $inserido;
    public $status;

    public function exchangeArray($data)
    {
        $this->id_grupo = isset($data['id_grupo']) ? $data['id_grupo'] : null;
        $this->nome = isset($data['nome']) ? $data['nome'] : null;
        $this->descricao = isset($data['descricao']) ? $data['descricao'] : null;
        $this->inserido = isset($data['inserido']) ? $data['inserido'] : null;
        $this->status = isset($data['status']) ? $data['status'] : null;
    }
}