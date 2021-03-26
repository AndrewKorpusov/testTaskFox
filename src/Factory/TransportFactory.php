<?php


namespace App\Factory;


use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class TransportFactory
{
    public static function createFromTransportCard(array $transportInfo)
    {
        $className = sprintf('App\\Entity\\%s' , ucfirst(strtolower($transportInfo['type'])));

        if (!class_exists($className)) {
            throw new BadRequestHttpException(sprintf('No class %s implemented for this transport type', $className));
        }

        $transport = new $className;
        unset($transportInfo['type']);

        foreach ($transportInfo as $key => $item) {
            $setterName = sprintf('set%s', ucfirst($key));
            if (method_exists($className, $setterName)) {
                $transport->{$setterName}($item);
            } else {
                throw new BadRequestHttpException(sprintf('Bad property provided: %s for transport type %s', $key, $className));
            }
        }

        return $transport;
    }
}