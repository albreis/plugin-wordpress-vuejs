# Plugin base para trabalhar com frontend em VueJS

## Instalação do plugin

Descompacte o plugin na pasta de plugin: /wp-content/plugins/

Altere o nome do arquivo principal res-manager.php para o de sua preferência. Renomeie também o bloco de comentário Plugin Name.

# Integrando o VueJS

Inicie um app usando vue-cli com o seguinte comando: vue create front

Copie o arquivo vue.config.js do diretório do plugin para a /front/

Feito isso você pode executar: cd front && npm run serve (ou: yarn serve)

O front inteiro será substituído pelo app Vue.

Para se comunicar com o WordPress você pode usar tanto ajax actions quanto endpoints customizados na REST API.