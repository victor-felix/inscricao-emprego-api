<?php

namespace Domain\Model\Candidato;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

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
    private $telefone;

    /**
     * @var Collection
     */
    private $habilidadesTecnicas;

    /**
     * @var string
     */
    private $link;

    /**
     * @var Collection
     */
    private $experienciasProfissionais;

    /**
     * @var string
     */
    private $anexo;

    /**
     * Candidato constructor.
     * @param string $nome
     * @param string $cpf
     * @param string $email
     * @param string $celular
     * @param string $telefone
     * @param string $link
     * @param string $anexo
     */
    public function __construct($nome, $cpf, $email, $celular, $telefone, $link, $anexo)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->celular = $celular;
        $this->telefone = $telefone;
        $this->habilidadesTecnicas = new ArrayCollection();
        $this->link = $link;
        $this->experienciasProfissionais = new ArrayCollection();
        $this->anexo = $anexo;
    }

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
     * @return Collection
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
     * @return Collection
     */
    public function getExperienciasProfissionais()
    {
        return $this->experienciasProfissionais;
    }

    /**
     * @return string
     */
    public function getAnexo()
    {
        return $this->anexo;
    }
}
