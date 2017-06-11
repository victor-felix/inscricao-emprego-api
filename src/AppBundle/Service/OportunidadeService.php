<?phpnamespace AppBundle\Service;use Domain\Model\Oportunidade\Oportunidade;use Domain\Model\Oportunidade\OportunidadeRepositoryInterface;use Domain\Service\OportunidadeServiceInterface;class OportunidadeService implements OportunidadeServiceInterface{    /**     * @var OportunidadeRepositoryInterface     */    private $oportunidadeRepository;    /**     * OportunidadeService constructor.     * @param OportunidadeRepositoryInterface $oportunidadeRepository     */    public function __construct(OportunidadeRepositoryInterface $oportunidadeRepository)    {        $this->oportunidadeRepository = $oportunidadeRepository;    }    /**     * @param Oportunidade $oportunidade     */    public function salvar(Oportunidade $oportunidade)    {        return $this->oportunidadeRepository->save($oportunidade);    }    /**     * @return array     */    public function listarTudo()    {        return $this->oportunidadeRepository->findAll();    }}