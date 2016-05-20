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
        $redirectTo = 'grupo_listar';
        if ($this->getRequest()->isPost()) {
            $grupoTable = $this->getServiceLocator()->get('Agenda\Model\GrupoTable');
            $params = $this->params()->fromPost();
            if (!isset($params['nome']) || empty($params['nome'])) {
                $redirectTo = 'grupo_adicionar';
                $this->flashMessenger()->addErrorMessage("O campo nome não deve ser vazio.");
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
}