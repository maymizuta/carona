# Instruções para acesso da API

##Login
  Método POST

  localhost\carona\api\user\login.json

  json:{'email':'seuemail@email.com','password':'suasenha'}

##Cadastro do usuário
  Método POST

  localhost\carona\api\user\add.json

  json:{'User':{'email':'seuemail@email.com','password':'suasenha','nome':'seunome'}}


##Cadastro de carona
  Método POST

  localhost\carona\api\carona\add.json

  json : {"id":"1","pontoInicial":"inicio","horarioDePartida":"00:00:00","horarioDeSaida":"00:00:00","incialLatitude":0,"incialLongitude":0}

