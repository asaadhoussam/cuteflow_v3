<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class WorkflowVersionTable extends Doctrine_Table {
    /**
     *
     * create new instance of AdditionalText
     * @return object UserLoginTable
     */
    public static function instance() {
        return Doctrine::getTable('WorkflowVersion');
    }


    public function getWorkflowsToStart($currenttime) {
        return Doctrine_Query::create()
            ->from('WorkflowVersion wfv')
            ->select('wfv.*,')
            ->where('wfv.workflowisstarted = ?','0')
            ->andWhere('wfv.startworkflow_at <= ?', $currenttime)
            ->execute();
    }



    public function getFieldByWorkflowversionIdAndFieldId($fieldId, $versionId) {
        return Doctrine_Query::create()
            ->from('WorkflowVersion wfv')
            ->select('wfv.*')
            ->leftJoin('wfv.WorkflowSlot wfs')
            ->leftJoin('wfs.WorkflowSlotField wfsf')
            ->where('wfsf.field_id = ?', $fieldId)
            ->andWhere('wfv.id = ?', $versionId)
            ->execute();
    }


    public function getAllVersionByWorkflowId($workflow_id) {
        return Doctrine_Query::create()
            ->from('WorkflowVersion wfv')
            ->select('wfv.*,')
            ->where('wfv.workflowtemplate_id = ?' ,$workflow_id)
            ->orderBy('wfv.version DESC')
            ->execute();
    }


    public function getAllVersionRevisionByWorkflowId($workflow_id) {
        return Doctrine_Query::create()
            ->from('WorkflowVersion wfv')
            ->select('wfv.*,')
            ->where('wfv.workflowtemplate_id = ?' ,$workflow_id)
            ->orderBy('wfv.id DESC')
            ->execute();
    }


    public function getWorkflowVersionById($id) {
        return Doctrine_Query::create()
            ->from('WorkflowVersion wfv')
            ->select('wfv.*,')
            ->where('wfv.id = ?' ,$id)
            ->execute();
    }

    public function startWorkflow($id) {
        Doctrine_Query::create()
            ->update('WorkflowVersion wfv')
            ->set('wfv.workflowisstarted','?',1)
            ->set('wfv.startworkflow_at','?', time())
            ->where('wfv.id = ?', $id)
            ->execute();
    }


    public function setEndReason($id, $endreason) {
        Doctrine_Query::create()
            ->update('WorkflowVersion wfv')
            ->set('wfv.endreason','?',$endreason)
            ->where('wfv.id = ?', $id)
            ->execute();
    }

    public function getLastVersionById($id) {
        return Doctrine_Query::create()
            ->from('WorkflowVersion wfv')
            ->select('wfv.*,')
            ->where('wfv.workflowtemplate_id = ?' ,$id)
            ->orderBy('wfv.version ASC')
            ->execute();
    }


    public function startWorkflowInFuture($versionid) {
        Doctrine_Query::create()
            ->update('WorkflowVersion wfv')
            ->set('wfv.workflowisstarted','?',1)
            ->where('wfv.id = ?', $versionid)
            ->execute();
    }


    public function setVersionInactive($id) {
        Doctrine_Query::create()
            ->update('WorkflowVersion wfv')
            ->set('wfv.activeversion','?',0)
            ->where('wfv.id = ?', $id)
            ->execute();
    }
}