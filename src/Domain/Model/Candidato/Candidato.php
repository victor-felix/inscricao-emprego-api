<?php

namespace Domain\Model\Candidato;

class Candidato
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $cpf;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $celular;

    /**
     * @var string
     */
    private $habilidadesTecnicas;

    /**
     * @var string
     */
    private $link;

    /**
     * @var string
     */
    private $experienciaProfissional;

    /**
     * @var string
     */
    private $anexo;

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * @return string
     */
    public function getHabilidadesTecnicas()
    {
        return $this->habilidadesTecnicas;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @return string
     */
    public function getExperienciaProfissional()
    {
        return $this->experienciaProfissional;
    }

    /**
     * @return string
     */
    public function getAnexo()
    {
        return $this->anexo;
    }
}