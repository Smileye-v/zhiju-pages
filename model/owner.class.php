<?php

/**
 * Created by PhpStorm.
 * User: 没猫撸
 * Date: 2019/12/27
 * Time: 9:26
 */
class owner
{
    private $owner_id;
    private $owner_number;
    private $owner_name;
    private $password;
    private $plot_name;

    /**
     * @return mixed
     */
    public function getOwnerId()
    {
        return $this->owner_id;
    }

    /**
     * @param mixed $owner_id
     */
    public function setOwnerId($owner_id)
    {
        $this->owner_id = $owner_id;
    }

    /**
     * @return mixed
     */
    public function getOwnerNumber()
    {
        return $this->owner_number;
    }

    /**
     * @param mixed $owner_number
     */
    public function setOwnerNumber($owner_number)
    {
        $this->owner_number = $owner_number;
    }

    /**
     * @return mixed
     */
    public function getOwnerName()
    {
        return $this->owner_name;
    }

    /**
     * @param mixed $owner_name
     */
    public function setOwnerName($owner_name)
    {
        $this->owner_name = $owner_name;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPlotName()
    {
        return $this->plot_name;
    }

    /**
     * @param mixed $plot_name
     */
    public function setPlotName($plot_name)
    {
        $this->plot_name = $plot_name;
    }
}