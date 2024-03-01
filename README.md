# InfraLogger

Ce module est plutôt un outil qu'un module, qui permet de logger des entrées dans des fichiers situés dans var/logs du projet Prestashop
Le logger respecte la PSR Log

### Configuration

Vous pouvez configurer le chemin et le nom des fichiers de logs``` par défaut les fichiers sont les suivants :

* `_PS_ROOT_DIR_. '/var/logs/' . 'application.log';`
* `_PS_ROOT_DIR_.'/var/logs/' . 'exception.log';`
* `_PS_ROOT_DIR_.'/var/logs/' . 'phperror.log';`


### Utilisation du Logger

Il y a 8 niveau de log :

    const EMERGENCY = 'emergency';
    const ALERT     = 'alert';
    const CRITICAL  = 'critical';
    const ERROR     = 'error';
    const WARNING   = 'warning';
    const NOTICE    = 'notice';
    const INFO      = 'info';
    const DEBUG     = 'debug';
    
Il y a une methode pour logger chaque niveau.

A savoir que le niveau 'error' sera logger dans le fichier `var/logs/phperror.log`. 

La classe à utiliser pour écrire un log est `InfraLogger\InfraLogger`.

    InfraLogger::debug("test debug log");
    InfraLogger::alert("test alert log");
    InfraLogger::emergency("test emergency log");
    InfraLogger::notice("test notice log");
    InfraLogger::critical("test critical log");
    InfraLogger::error("test error log");
    InfraLogger::warning("test warning log");
    InfraLogger::info("test info log");
    
Il est aussi possible de logger les exception dans un fichier séparer (`var/logs/exception.log).

    InfraLogger::exception(new Exception());



