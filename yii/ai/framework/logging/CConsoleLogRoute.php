<?php
/**
 * CConsoleLogRoute class file.
 * Copyright 2011 Yunrang Inc. All Rights Reserved.
 * Author: chenwang@yunrang.com (Chen Wang)
 */
class CConsoleLogRoute extends CLogRoute
{
    protected function processLogs($logs)
    {
        $stdout = fopen('php://stdout', 'w');
        foreach ($logs as $log) {
            @fwrite($stdout, $this->formatLogMessage($log[0], $log[1], $log[2], $log[3]));
        }
    }
}
