<?php
namespace Bytecode\Opera\Libs;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Monolog\Logger;
use Monolog\Handler\RotatingFileHandler;
use Monolog\ErrorHandler;
use Monolog\Formatter\LineFormatter;

class Log{
    private $logger = null;
    public function __construct() {
        $this->logger = new Logger('hb-quality');
       

        $lineFormatter = new LineFormatter(LineFormatter::SIMPLE_FORMAT, LineFormatter::SIMPLE_DATE);
        $lineFormatter->includeStacktraces(true); // <--
        $handler = new RotatingFileHandler('./Logs/app.log', 0, Logger::INFO, true, 0664);
        # '/' in date format is treated like '/' in directory path
        # so Y/m/d-filename will create path: eg. 2017/07/21-filename.log
        $handler->setFilenameFormat('{date}-{filename}', 'Y/m/d');
        $handler->setFormatter($lineFormatter);
        $this->logger->pushHandler($handler);
        ErrorHandler::register($this->logger);

        // $this->logger->pushHandler(new StreamHandler('./app.log', Logger::DEBUG));
        
    }

    public function Info($message, $src = null, $contextualData = []) {
        $this->logger->info( "src: {$src}, message:  {$message}", $contextualData); 
    }

    public function Error($message, $src = null, $contextualData = []) {
        $this->logger->error( "src: {$src}, message:  {$message}", $contextualData);
    }
    
    public function Warning($message, $src = null, $contextualData = []) {
        $this->logger->warning("src: {$src}, message:  {$message}", $contextualData);
    }

}
