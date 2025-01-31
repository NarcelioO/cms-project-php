# Documentação da Aplicação

## Descrição
Esta é a documentação para a aplicação demo. Aqui você encontrará todas as informações necessárias para configurar e executar a aplicação.

## Dependências
Certifique-se de ter as seguintes dependências instaladas:

- PHP >= 7.4
- Composer
- XAMPP

## Instalação

### Passo 1: Clonar o Repositório
```bash
git clone https://github.com/narcelioO/demo-aceda.git
cd demo-aceda
```

### Passo 2: Instalar Dependências
```bash
composer install
```

### Passo 3: Configurar o Ambiente
Renomeie o arquivo `.env.example` para `.env` e configure as variáveis de ambiente conforme necessário.

### Passo 4: Configurar o Banco de Dados
Configure seu banco de dados no arquivo `.env` e execute as migrações:
```bash
composer run-script migrate
```

## Executando a Aplicação
Inicie o servidor do XAMPP e acesse a aplicação no navegador:
```
http://localhost/seu-repositorio/public
```

## Testes
Para executar os testes, use o seguinte comando:
```bash
composer test
```

## Contribuição
Sinta-se à vontade para contribuir com este projeto. Envie um pull request com suas alterações.

## Licença
Este projeto está licenciado sob a licença MIT. Veja o arquivo LICENSE para mais detalhes.
