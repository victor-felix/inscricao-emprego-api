<?php
namespace Infrastructure\Service;

use Domain\Model\Inscricao\Inscricao;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class EmailService
{

    /**
     * @param Inscricao $inscricao
     */
    public function enviarNotificacaoInscricao(Inscricao $inscricao)
    {
        $candidato = $inscricao->getCandidato();
        $destinatario = $candidato->getEmail();
        $destinatarioNome = $candidato->getNome();
        $assunto = 'Inscrição de Emprego - Código de confirmação';
        $corpo = "Olá, " . $destinatarioNome . "\n" .
            "Seu código de confirmação de inscrição é: " . $inscricao->getCodigoConfirmacao();

        $this->enviarNotificacao($destinatario, $destinatarioNome, $assunto, $corpo);
    }

    /**
     * @param string $destinatario
     * @param string $destinatarioNome
     * @param string $assunto
     * @param string $corpo
     */
    private function enviarNotificacao(
        string $destinatario,
        string $destinatarioNome,
        string $assunto,
        string $corpo
    ) {
        //pode ser colocado tanto aqui, ou puxando através do yml, sendo que ficaria no parametro da action
        $transport = (new Swift_SmtpTransport('mail.smtp2go.com', 2525))
            ->setUsername('inscricao-emprego')
            ->setPassword('1qb1BreFCRqE')
        ;
        $mailer = new Swift_Mailer($transport);

        // Criação da mensagem
        $message = new Swift_Message($assunto);

        $message->setFrom(["suporte.inscricao@hotmail.com" => "Suporte - Inscrição de Emprego"])
            ->setTo([$destinatario => $destinatarioNome])
            ->setBody($corpo)
        ;

        // Dispara o e-mail
        $mailer->send($message);
    }
}