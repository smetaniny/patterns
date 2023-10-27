<?php

namespace App\Http\Controllers\PHP8\P415Observer;

class ProgramP415Observer
{
    public function index() {
        // Создается экземпляр класса `Login`.
        $login = new Login();
        // Вызывается метод `handleLogin` на экземпляре `Login` с аргументами "user", 'pas', '124.5698'. Этот метод имитирует попытку входа пользователя и устанавливает статус входа.
        $login->handleLogin("user", 'pas', '124.5698');
        // Создаются три экземпляра различных классов, которые наследуются от `LoginObserver` и, таким образом, являются наблюдателями: `SecurityMonitor`, `GeneralLogger` и `PartnershipTool`.
        // Каждый из них вызывает метод `doUpdate($login)` с экземпляром `Login` в качестве аргумента.
        // В итоге, при вызове метода `doUpdate($login)` на каждом из наблюдателей, они выполняют свою логику в соответствии с текущим статусом входа, который был установлен методом `handleLogin` в экземпляре `Login`.
        // В данном случае, `SecurityMonitor` выполняет свою логику, так как статус входа установлен как `LOGIN_WRONG_PASS`. `GeneralLogger` и `PartnershipTool` также могут выполнить свою логику, если она связана с определенными статусами входа.
        $securityMonitor = new SecurityMonitor($login);
        $securityMonitor->doUpdate($login);
        $generalLogger = new GeneralLogger($login);
        $generalLogger->doUpdate($login);
        $partnershipTool = new PartnershipTool($login);
        $partnershipTool->doUpdate($login);
    }
}
