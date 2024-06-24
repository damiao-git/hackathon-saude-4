<p align="center"><img src="https://github.com/damiao-git/hackathon-saude-4/blob/master/public/imagens/topo.jpg" width="800" alt="CodeCreators"></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<br>


## 📚 Projeto Tempo Zero

O Tempo Zero  é uma plataforma de atendimento  online, que moderniza o atendimento de hospitais e clinicas para trazer agilidade no atendimento aos pacientes.

O principal objetivo desta iniciativa é reduzir os tempos de espera e acabando com as longas horas passadas numa sala de espera para aqueles que necessitam de cuidados urgentes e ao mesmo tempo que garante que os recursos sejam utilizados de forma eficaz, dando prioridade aos casos que exigem atenção imediata.
<br><br>
> Participar deste hackathon foi uma jornada<br>
> incrível de aprendizado e colaboração.<br>
> Agradecemos imensamente pela oportunidade<br>
> de crescer, inovar e compartilhar ideias.<br>
> Equipe "Code Creators"
<br>

## 🚀 Tecnologias Utilizadas

Abaixo as ferramentas e tecnologias que foram utilizadas no nosso projeto.

<p align="left">
  <a href="https://skillicons.dev">
    <img src="https://skillicons.dev/icons?i=git,github,php,laravel,vscode,linux,nodejs,js,html,jquery,mysql,flutter" />
  </a>
</p>
<br>

## 📷 Telas do MVP

Os pacientes podem iniciar o pré-atendimento em casa através do aplicativo Tempo Zero. 
Eles inserem dados como nome, local de atendimento, idade, telefone, peso, gênero, histórico médico.
<p align="left"><img src="https://github.com/damiao-git/hackathon-saude-4/blob/master/public/imagens/mvp1.png" width="800" alt="CodeCreators"></p>
<br>
Também adicionam, medicamentos em uso, cirurgias, sintomas com descrição e intensidade e se o paciente realizou a aferição dos sinais vitais em casa, ele também consegue adicionar no aplicativo. A IA analisa essas informações para uma pré-avaliação inicial.
<p align="left"><img src="https://github.com/damiao-git/hackathon-saude-4/blob/master/public/imagens/mvp2.png" width="800" alt="CodeCreators"></p>

## Arquitetura da Solução

A solução utiliza três tecnologias modernas: Python, Laravel e Ollama, todas integradas de maneira eficiente. A comunicação funciona da seguinte forma: uma requisição é enviada pelo aplicativo "Tempo Zero" para a nossa API desenvolvida em Laravel. Em seguida, a API faz uma requisição para o script Python, que junta os dados enviados pelo aplicativo com a base de dados. Após essa etapa, tudo é enviado para o Ollama, que processa as informações e devolve os resultados para o aplicativo.

<p align="center"><img src="https://github.com/damiao-git/hackathon-saude-4/blob/master/public/imagens/arquitetura.png" width="800" alt="CodeCreators"></p>

# ⚙️ Instalação

### Instalação da Inteligência Artificial

- <b>Windows</b><br>
Para instalar o Ollama no Windows use o link abaixo:<br>
https://ollama.com/download

- <b>Linux</b><br>
Para instalar o Ollama no Linux use o comando abaixo:<br>

```sh
python meu_script.pycurl -fsSL https://ollama.com/install.sh | sh
```

### Script Python

```python
from flask import Flask, request, jsonify
import os
from langchain_community.document_loaders import TextLoader
from langchain_community.vectorstores import InMemoryVectorStore
from langchain_community.llms import Ollama
from langchain.indexes import VectorstoreIndexCreator

app = Flask(__name__)

@app.route('/query', methods=['POST'])
def query():
    data = request.get_json()
    query_text = data.get('query', '')

    # Inicialize o modelo Ollama
    llm = Ollama(model='llama3')

    # Carregar os documentos
    loader = TextLoader("data.txt", encoding='utf8')
    index = VectorstoreIndexCreator().from_loaders([loader])

    # Realizar a consulta
    query_result = index.query(query_text)

    return jsonify({'result': query_result})

if __name__ == '__main__':
    app.run(port=5000)

```

## Endpoints das APIs do Projeto
A seguir, apresentamos os endpoints das APIs do nosso projeto. O aplicativo utilizará essas APIs para estabelecer a conexão e realizar as operações necessárias.

#### Listar Pacientes

```http
  GET /api/pacientes
```

#### Cadastrar um Paciente

```http
  POST /api/pacientes
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| nome | string | Obrigatório. O nome do paciente. |
| idade | integer | Obrigatório. A idade do paciente. |
| sexo | string | Obrigatório. O sexo do paciente (M/F). |
| sintomas | string | Opcional. Sintomas apresentados pelo paciente. |
| pressao_arterial | string | Opcional. Pressão arterial do paciente. |
| temperatura | float | Opcional. Temperatura corporal do paciente. |
| glicemia | integer | Opcional. Nível de glicemia do paciente. |
| saturacao | integer | Opcional. Saturação de oxigênio do paciente. |
| batimentos_cardiacos | integer | Opcional. Batimentos cardíacos por minuto. |
| email | string | Opcional. E-mail de contato do paciente. |
| tipo_pessoa | string | Opcional. Tipo de pessoa (Adulto/Criança). |

#### Retorna um Paciente

```http
  GET /api/pacientes/${id}
```

#### Atualizar um Paciente

```http
  PUT /api/pacientes/${id}
```
| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| nome | string | Opcional. O nome do paciente. |
| idade | integer | Opcional. A idade do paciente. |
| sexo | string | Opcional. O sexo do paciente (M/F). |
| sintomas | string | Opcional. Sintomas apresentados pelo paciente. |
| pressao_arterial | string | Opcional. Pressão arterial do paciente. |
| temperatura | float | Opcional. Temperatura corporal do paciente. |
| glicemia | integer | Opcional. Nível de glicemia do paciente. |
| saturacao | integer | Opcional. Saturação de oxigênio do paciente. |
| batimentos_cardiacos | integer | Opcional. Batimentos cardíacos por minuto. |
| email | string | Opcional. E-mail de contato do paciente. |
| tipo_pessoa | string | Opcional. Tipo de pessoa (Adulto/Criança). |

#### Deletar um Paciente

```http
  DELETE /api/pacientes/${id}
```

#### Checkin do Paciente

```http
  GET /api/chegada/${id}
```

#### Retorna o atendimento mais recente de um paciente

```http
  ANY /api/pacientes/atendimento/email/{email}
```



## Road Map

- [x] MVP da Solução
- [x] Desenvolvimento da API para o MVP
- [x] Desenvolvimento do Script Python para integração da API com o Ollama.
- [ ] Criar um modelo personalizado no Ollama


## 📝 Licença

<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a><br>
