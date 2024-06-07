<?php

namespace App\EventSubscriber;

use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Class RequestLoggerSubscriber
 * Escuche el evento kernel.request y registre en un archivo de log cada visita a cualquier página de la aplicación.
 *
 * @package App\EventSubscriber
 */
class RequestLoggerSubscriber implements EventSubscriberInterface
{
    /**
     * Servicio de logs
     * @var LoggerInterface
     */
    private $logger;

    /**
     * RequestLoggerSubscriber constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /** Cuando ocurre el evento registra en el fichero de logs que página se ha visitado.
     * @param RequestEvent $event
     */
    public function onKernelRequest(RequestEvent $event): void
    {
        $this->logger->info('Visita a la página: ' . $event->getRequest()->getRequestUri());
    }

    /** Establece los eventos a los que se subscribe
     * @return string[]
     */
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => 'onKernelRequest',
        ];
    }
}
