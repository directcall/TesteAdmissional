<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 20/05/2016
 * Time: 11:09
 */

namespace Agenda\Model;


use Zend\Db\TableGateway\TableGateway;

class GrupoTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();

        return $resultSet;
    }

    public function insert($dados)
    {
        $this->tableGateway->insert($dados);
        return $this->tableGateway->getLastInsertValue();
    }

    public function update($dados, $where)
    {
        return $this->tableGateway->update($dados, $where);
    }

    public function delete($id)
    {
        return $this->tableGateway->delete(array('id_contato' => $id));
    }
}