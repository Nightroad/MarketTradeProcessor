<?php
/**
 * Created by PhpStorm.
 * User: Arch Gentoo
 * Date: 05.08.17
 * Time: 11:09
 */

namespace MarketTradeProcessor\Shared;


class CliActionResolver extends ActionResolver
{
    private static $map = array(
        'feed' => '\\MarketTradeProcessor\\MessageConsumer\\Test::feed',
        'config' => '\\MarketTradeProcessor\\MessageProcesor\\API::readConfig',
        'import_iso4217' => '\\MarketTradeProcessor\\Shared\\ISO4217::importToDatabase',
        'import_iso3166' => '\\MarketTradeProcessor\\Shared\\ISO3166_1_ALPHA2::importToDatabase',

        'chartData' => '\\MarketTradeProcessor\\MessageProcesor\\API::getChartData',
    );

    public function canHandleRequest()
    {
        if (php_sapi_name() == 'cli')
        {
            if ($_SERVER['argc'] > 1)
            {
                $action = $_SERVER['argv'][1];

                if(array_key_exists($action, self::$map))
                {
                    $this->runAction = self::$map[$action];
                    return true;
                }
            }
        }

        return false;
    }

} 