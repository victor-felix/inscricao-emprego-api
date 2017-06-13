inscricao-emprego-api
=====================
A Symfony project created on May 30, 2017, 7:03 pm.

### Passos para rodar a api
 
1. gerar dump do doctrine ./bin/console doctrine:schema:update --dump-sql
2. copiar o dump e executar
3. por último basta executar o comando: php bin/console server:run

=================================

### Cache

1. No caminho "/" do computador criar pasta "temporario", dentro de temporario criar "inscricao-emprego", dentro de inscricao-emprego, criar "cache" e "log" separados.
2. Nestas pastas será armezado tudo de cache, referente ao doctrine, serializer, twig, logs, entre outros.

======================

### AppBundle

+ Nesta pasta fica os controllers, eventos e serviços.

+ Todos os controllers criado são via rest.

+ O evento que foi criado foi apenas para disparar o e-mail no ato da inscrição.

=================================
### Domain

+ Nesta pasta fica as classes que representam a entidade e as interfaces de repositórios e serviços. 

=================================

### Infrastructure

+ Nesta pasta ficará toda a camada de infra.., exemplo: Doctrine, Serializer.
+ Existe uma pasta de infrastructure na pasta raiz app, onde tem os mapeamentos pelo doctrine e a serialização de objetos na pasta serializer.

===============================
 ### Presentation
 
 + Nesta pasta ficará toda a camada de apresentação, no caso eu poderia utilizar o twig ou algo do tipo.
 
 + Foi criado uma pasta DataTransferObject, conhecido como DTO, é bastante utilizavél em JAVA, e eu costumo usar nos meus projetos.