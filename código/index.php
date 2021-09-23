<? php

$ cep = '92705520' ;
$ server = "viacep.com.br/ws/01001000/xml/" ;
$ info = curl_info ( $ server );

if ( $ info [ 'http_code' ] == 200 ) {
    //Conectados
    $ xml_file = file_get_contents ( "https://viacep.com.br/ws/01001000/xml/" );   
    $ xml_str = xml_decode ( $ xml_file , verdadeiro );
    $ logradouro = $ xml_str [ "logradouro" ];
    $ bairro = $ xml_str [ "bairro" ];
    $ localidade = $ xml_str [ "localidade" ];
    $ uf = $ xml_str [ "uf" ];
    echo  'Rua:' . $ logradouro . '- Bairro:' . $ bairro . '- Cidade:' . $ localidade . '- UF:' . $ uf ; // Comentário no uso (serve para testes)
} else {
    //Desligada
    echo  'A API está indisponível' ;
}

// Função curl para teste de disponibilidade da API ViaCEP
function  curl_info ( $ url ) {
    $ ch = curl_init ();
    curl_setopt ( $ ch , CURLOPT_URL , $ url );
    curl_setopt ( $ ch , CURLOPT_HEADER , 1 );
    curl_setopt ( $ ch , CURLOPT_RETURNTRANSFER , 1 );
    curl_setopt ( $ ch , CURLOPT_FOLLOWLOCATION , 1 );
    $ content = curl_exec ( $ ch );
    $ info = curl_getinfo ( $ ch );
    $ httpcode = curl_getinfo ( $ ch , CURLINFO_HTTP_CODE );
    return  $ info ;
}

?>