<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 20/05/2016
 * Time: 16:15
 */

namespace Agenda\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class GrupoController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }

    public function adicionarAction()
    {
        $grupoTable = $this->getServiceLocator()->get('Agenda\Model\GrupoTable');
        $id_grupo = $this->params()->fromRoute('id_grupo');

        if (!is_null($id_grupo) && is_numeric($id_grupo))
            $grupo = $grupoTable->fetchById($id_grupo);

        $redirectTo = 'grupo_listar';
        if ($this->getRequest()->isPost()) {
            $params = $this->params()->fromPost();
            if (!isset($params['nome']) || empty($params['nome'])) {
                $redirectTo = 'grupo_adicionar';
                $this->flashMessenger()->addErrorMessage("O campo nome não deve ser vazio.");
            } else if (isset($params['id_grupo'])) {
                $id_grupo = $params['id_grupo'];
                unset($params['id_grupo']);
                $atualizado = $grupoTable->update($params, array('id_grupo' => $id_grupo));
                if ($atualizado)
                    $this->flashMessenger()->addMessage("Grupo <strong>{$params['nome']}</strong> atualizado com sucesso!");
                else
                    $this->flashMessenger()->addWarningMessage("O grupo não foi atualizado.");
            } else {
                $id_grupo = $grupoTable->insert($params);
                if ($id_grupo)
                    $this->flashMessenger()->addMessage("Grupo <strong>{$params['nome']}</strong> adicionado com sucesso!");
                else
                    $this->flashMessenger()->addErrorMessage("Ocorreu um erro ao inserir o grupo.");
            }
            return $this->redirect()->toRoute($redirectTo);
        }

        $retorno = array(
            'grupo'            => isset($grupo) ? $grupo : false,
            'error_messages'   => $this->flashMessenger()->getErrorMessages(),
            'warning_messages' => $this->flashMessenger()->getWarningMessages(),
            'messages'         => $this->flashMessenger()->getMessages(),
        );
        return new ViewModel($retorno);
    }

    public function listarAction()
    {
        $grupoTable = $this->getServiceLocator()->get('Agenda\Model\GrupoTable');
        $listaGrupos = $grupoTable->fetchAll();
        $retorno = array(
            'grupos'           => $listaGrupos,
            'error_messages'   => $this->flashMessenger()->getErrorMessages(),
            'warning_messages' => $this->flashMessenger()->getWarningMessages(),
            'messages'         => $this->flashMessenger()->getMessages(),
        );
        return new ViewModel($retorno);
    }

    public function removerAction()
    {

        $id_grupo = $this->params()->fromRoute('id_grupo');
        if (!is_null($id_grupo) && is_numeric($id_grupo)) {
            $grupoTable = $this->getServiceLocator()->get('Agenda\Model\GrupoTable');
            $removido = $grupoTable->delete($id_grupo);
            if ($removido)
                $this->flashMessenger()->addMessage("Grupo removido com sucesso!");
            else
                $this->flashMessenger()->addErrorMessage("Não foi possivel remover o grupo.");
        } else {
            $this->flashMessenger()->addErrorMessage("Não foi possivel remover o grupo.");
        }
        return $this->redirect()->toRoute('grupo_listar');
    }
}