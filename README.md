# Instruções para acesso da API

##Login
  Método POST

  localhost\carona\api\users\login.json

  json:{'email':'seuemail@email.com','password':'suasenha'}

##Cadastro do usuário
  Método POST

  localhost\carona\api\users\add.json

  json:{'User':{'email':'seuemail@email.com','password':'suasenha','nome':'seunome'}}


##Cadastro de carona
  Método POST

  localhost\carona\api\caronas\add.json

  json : {"id":"1","pontoInicial":"inicio","horarioDePartida":"00:00:00","horarioDeSaida":"00:00:00","incialLatitude":0,"incialLongitude":0}

##Lista de pedidos
  Método POST/GET

  localhost\carona\api\pedidos\index.json

Retorno
  json : [{"Pedido":{"id":"1","user_id":"9","carona_id":"1","aceito":null,"created":null},"User":{"email":"email@example.com","id":"9","nome":"nome"},"Carona":{"id":"1"}},{"Pedido":{"id":"2","user_id":"9","carona_id":"1","aceito":null,"created":null},"User":{"email":"email@example.com","id":"9","nome":"nome"},"Carona":{"id":"1"}}]


##Aceitar/Recusar pedido
  Método POST

http://localhost/carona/api/pedidos/confirm.json

Envio
json: {"Pedido":{"id":2, "aceito":1}}

Retorno:
Encontrado e confirmado/recusado o pedido
{"message":"Pedido Salvo"}
Encontrado porém não foi possível salvar o pedido
{"message":"Não foi possível salvar o pedido"}
Não encontrado o pedido.
{"message":"Não foi possível confirmar o pedido"}
