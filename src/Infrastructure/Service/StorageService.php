<?php

namespace Infrastructure\Service;

use League\Flysystem\Exception;
use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local as Adapter;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

final class StorageService
{
    const ROOT_STORAGE = '/inscricao-emprego/candidato';
    protected $fileSystem;

    /**
     * StorageService constructor.
     */
    public function __construct()
    {
        $this->fileSystem = new Filesystem(new Adapter(self::ROOT_STORAGE));
    }

    /**
     * @param string $base64
     * @return string
     * @throws ChecksumFailedException
     * @throws PdfInvalidException
     */
    public function salvarBase64(string $base64)
    {
        $nomeArquivo = $this->gerarNomeAleatorio();

        $this->fileSystem->put($nomeArquivo, base64_decode($base64));

        return $nomeArquivo;
    }

    public function download($filename)
    {
        if (!$this->fileSystem->has($filename)) {
            throw new Exception('Arquivo não encontrado.');
        }

        $response = new Response($this->fileSystem->read($filename));

        $response->headers->set('Content-Type',
            $this->fileSystem->getMimetype($filename));
        $response->headers->set('Content-Description', 'File Transfer');
        $response->headers->set('Expires', 0);
        $response->headers->set('Cache-Control',
            'must-revalidate, post-check=0, pre-check=0');
        $response->headers->set('Content-Length',
            $this->fileSystem->getSize($filename));

        $d = $response->headers->makeDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            $filename);
        $response->headers->set('Content-Disposition', $d);
        $response->send();

        exit();
    }

    /**
     * @return string
     */
    private function gerarNomeAleatorio()
    {
        do {
            $nomeGerado = uniqid('', true) .'.docx';
        } while ($this->fileSystem->has($nomeGerado));

        return $nomeGerado;
    }
}