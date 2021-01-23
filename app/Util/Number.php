<?php 

namespace App\Util;

use Lang;


/**
 * Custom class for handling of number values.
 */
class Number {

    /**
     * Thousands map
     * @var array
     */
    protected static $thousands = [
        'int' => ',',
        'br'  => '.',
    ];

    /**
     * Decimal map
     * @var array
     */
    protected static $decimal = [
        'int' => '.',
        'br'  => ',',
    ];

    /**
     * Currency map
     * @var array
     */
    protected static $currency = [
        'int' => '$',
        'br'  => 'R$',
    ];


    /**
     * Return the thousands separator based on decimal format application.
     * @return mixed
     */
    public static function thousands($format = 'br')
    {
        return static::$thousands[$format];
    }

    /**
     * Return the decimal separator based on decimal format application.
     * @return mixed
     */
    public static function decimal($format = 'br')
    {
        return static::$decimal[$format];
    }

    /**
     * Return the decimal precision configuration.
     * @return mixed
     */
    public static function precision()
    {
        return 2;
    }

    /**
     * Return the money precision configuration.
     * @return mixed
     */
    public static function moneyPrecision()
    {
        return 2;
    }

    /**
     * Return the decimal separator based on decimal format application.
     * @return mixed
     */
    public static function currency()
    {
        return static::$currency['br'];
    }

	/**
     * Format a currency value to application configured format.
     * @param  mixed $value
     * @return mixed
     */
    public static function toMoneyApp($value, $format = 'br')
    {
        $precision = static::moneyPrecision();
        $parts = explode('.', $value);
        $decimal = count($parts) > 1? $parts[1] : '';

        switch ($format)
        {
            case 'int':
                $value = number_format($value, $precision);
                break;
            case 'br':
                $value = number_format($value, $precision, ',', '.');
                break;
        }

        $value = str_pad($value, $precision - strlen($decimal), '0');

        return $value;
    }

    /**
     * Return a number from a currency value in application configured format.
     * @param  mixed $value
     * @return mixed
     */
    public static function fromMoneyApp($value, $format = 'br')
    {
        switch ($format)
        {
            case 'int':
                $value = str_replace(',', '', $value);
                break;
            case 'br':
                $value = str_replace(',', '.', str_replace('.', '', $value));
                break;
        }

        return $value;
    }

    /**
     * Format a decimal value to application configured format.
     * @param  mixed $value
     * @return mixed
     */
    public static function toDecimalApp($value, $format = 'br')
    {
        $precision = static::precision();
        $parts = explode('.', $value);
        $decimal = count($parts) > 1? $parts[1] : '';

        switch ($format)
        {
            case 'int':
                $value = number_format($value, $precision);
                break;
            case 'br':
                $value = number_format($value, $precision, ',', '.');
                break;
        }

        $value = str_pad($value, $precision - strlen($decimal), '0');

        return $value;
    }

    /**
     * Return a number from a decimal value in application configured format.
     * @param  mixed $value
     * @return mixed
     */
    public static function fromDecimalApp($value, $format = 'br')
    {
        switch ($format)
        {
            case 'int':
                $value = str_replace(',', '', $value);
                break;
            case 'br':
                $value = str_replace(',', '.', str_replace('.', '', $value));
                break;
        }

        return $value;
    }

    /**
     * Return a decimal number in raw format.
     * @param  mixed $value
     * @return mixed
     */
    public static function toDecimalRaw($value)
    {
        $precision = static::precision();
        $parts = explode('.', $value);
        $decimal = count($parts) > 1? $parts[1] : '';
        $value = number_format($value, $precision, '.', '');

        return str_pad($value, $precision - strlen($decimal), '0');
    }

    /**
     * Return a number with a percentage discount applied.
     * @param  mixed $value
     * @param  number $percentage
     * @return mixed
     */
    public static function applyDiscount($value, $percentage = 0)
    {
        return bcsub($value, bcmul($value, bcdiv($percentage, 100)));
    }

    /**
     * Return a number with a percentage rate applied.
     * @param  mixed $value
     * @param  number $percentage
     * @return mixed
     */
    public static function applyRate($value, $percentage = 0)
    {
        return bcadd($value, bcmul($value, bcdiv($percentage, 100)));
    }

    /**
     * Return a percentage from two values.
     * @param  number $total
     * @param  number $part
     * @return number
     */
    public static function perc($total, $part)
    {
        $total = floatval($total);

        return floatval($total? bcmul(bcdiv($part, $total), 100) : 0);
    }

    /**
     * Return a percentage from a value
     * @param  number $value
     * @param  number $percentage
     * @return number
     */
    public static function percentage($value, $percentage)
    {
        return floatval($value? bcdiv(bcmul($percentage, $value), 100) : 0);
    }

    /**
     * Return a proportion from two values.
     * @param  number $total
     * @param  number $part
     * @return number
     */
    public static function prop($total, $part)
    {
        $total = floatval($total);

        return floatval($total? bcdiv(bcmul($part, 100, 2), $total, 2) : 0);
    }

    /**
     * Return a value to total by percent.
     * @param  number $total
     * @param  number $part
     * @return number
     */
    public static function valueToPerc($total, $percentage)
    {
        $total = floatval($total);

        return floatval(bcmul(bcdiv($percentage, 100, 3), $total, static::precision()));
    }

    /**
     * Check if the value is money app format
     * @param  mixed $value
     * @return bool
     */
    public static function isMoneyApp($value)
    {
        // return static::isDecimalApp($value, 'money-format');
    }

    /**
     * Check if the value is app format
     * @param  mixed $value
     * @param  string $format
     * @return bool
     */
    public static function isDecimalApp($value, $format = 'decimal-format')
    {
        // $precision = static::precision();
        // $key = $precision > 0? 1 : 0;
        // $fmt = Cfg::value($format);

        // $patterns = [
        //     'int' => ['/^\d{1,3}(,\d{3})$/', '/^\d{1,3}(,\d{3})*\.\d{:p}$/'],
        //     'br'  => ['/^\d{1,3}(\.\d{3})$/', '/^\d{1,3}(\.\d{3})*,\d{:p}$/']
        // ];

        // $pattern = str_replace(':p', $precision, $patterns[$fmt][$key]);

        // return (bool)preg_match($pattern, (string)$value);
    }

    /**
     * Format file size
     * @param  int $bytes
     */
    public static function formatSizeUnits($bytes)
    {
        $bytes = (int)$bytes;
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
}

}
