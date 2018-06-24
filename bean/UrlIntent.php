<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/8
 * Time: 15:29
 */

class UrlIntent
{
    private $_member=['Project','Module','Action','Behavior'];
    private $_project;
    private $_module;
    private $_action;
    private $_behavior;

    /**
     * @return array
     */
    public function getMember()
    {
        return $this->_member;
    }

    /**
     * @return mixed
     */
    public function getProject()
    {
        return $this->_project;
    }

    /**
     * @param mixed $project
     */
    public function setProject($project)
    {
        $this->_project = $project;
    }

    /**
     * @return mixed
     */
    public function getModule()
    {
        return $this->_module;
    }

    /**
     * @param mixed $module
     */
    public function setModule($module)
    {
        $this->_module = $module;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->_action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->_action = $action;
    }

    /**
     * @return mixed
     */
    public function getBehavior()
    {
        return $this->_behavior;
    }

    /**
     * @param mixed $behavior
     */
    public function setBehavior($behavior)
    {
        $this->_behavior = $behavior;
    }

}