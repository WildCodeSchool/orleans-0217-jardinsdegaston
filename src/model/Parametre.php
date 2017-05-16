<?php
// --- src/model/Parametre.php ---

namespace wcs\model;


class Parametre
{
    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $chezgaston;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Parametre
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getChezGaston()
    {
        return $this->chezgaston;
    }

    /**
     * @param mixed $chezgaston
     * @return Parametre
     */
    public function setChezGaston($chezgaston)
    {
        $this->chezgaston = $chezgaston;
        return $this;
    }


}