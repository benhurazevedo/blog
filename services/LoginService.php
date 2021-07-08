<?php

namespace services;

final class LoginService
{
    private $configServidorLDAP;
    private $container;
    public function __construct($c, array $configServidorLDAP)
    {
        $this->configServidorLDAP = $configServidorLDAP;
        $this->container = $c;
    }
    public function consultaLDAP($matricula)
    {


        $username = "corpcaixa\\s5402001";
        $password = "s5402001";

        $config = [
            'hosts'     => $this->configServidorLDAP['hostLdap'], 'base_dn'  => $this->configServidorLDAP['baseDN']
            // ,'username' => $matricula  . '@corp.caixa.gov.br'
            // ,'password' => $senha
            , 'username' => $username, 'password' => $password
        ];
        $ldap = $this->container['ldap'];
        $ldap->addProvider($config);
        $provider = $ldap->connect();
        $results = $provider->search()->where(
            'sAMAccountName',
            '=',
            $matricula
        )->select([
            'cn', 'samaccountname', 'extensionattribute1' #'extensionattribute10'
            , 'title', 'mail', 'extensionattribute12', 'department'
        ])->get();
        return [
            'nomeCompleto' =>  $results[0]['cn'][0], 'primeiroNome' =>  explode(" ", $results[0]['cn'][0])[0], 'matricula' =>  $results[0]['samaccountname'][0], 'codigoUnidade' =>  substr($results[0]['extensionattribute1'][0], -4) #substr ($results[0]['extensionattribute10'][0], -4)
            , 'nomeUnidade' =>  $results[0]['department'][0], 'nomeFuncao' =>  $results[0]['title'][0], 'codigoFuncao'                 =>  substr($results[0]['extensionattribute12'][0], 0, 4), 'email'                        =>  $results[0]['mail'][0]
        ];
    }
    public function consultaAvatar($matricula)
    {

        $username = "corpcaixa\\s5402001";
        $password = "s5402001";

        $config = [
            'hosts'     => $this->configServidorLDAP['hostLdap'], 'base_dn'  => $this->configServidorLDAP['baseDN']
            // ,'username' => $matricula  . '@corp.caixa.gov.br'
            // ,'password' => $senha
            , 'username' => $username, 'password' => $password
        ];
        $ldap = $this->container['ldap'];
        $ldap->addProvider($config);
        $provider = $ldap->connect();
        $results = $provider->search()->where(
            'sAMAccountName',
            '=',
            $matricula
        )->select([
            'thumbnailphoto' #-> avatar do usuario
        ])->get();

        return $results[0]['thumbnailphoto'][0];
    }
}
