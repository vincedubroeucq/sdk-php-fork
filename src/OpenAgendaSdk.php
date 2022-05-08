<?php

namespace OpenAgendaSdk;

/**
 * Class OpenAgendaSdk
 * @package OpenAgendaSdk
 *
 * @link https://developers.openagenda.com
 */
class OpenAgendaSdk
{
    /**
     * @var HttpClient
     */
    private $client;

    /**
     * @var string|null
     */
    private $publicKey;

    /**
     * @var array|null
     */
    private $clientOptions;

    /**
     * OpenAgendaSdk constructor.
     *
     * @param string|null $publicKey
     * @param array|null $clientOptions
     *
     * @see \OpenAgendaSdk\RequestOptions for a list of available client options.
     */
    public function __construct(?string $publicKey, ?array $clientOptions = [])
    {
        $this->publicKey = $publicKey;
        $this->clientOptions = $clientOptions;
    }

    /**
     * @return HttpClient
     */
    /**
     * @return HttpClient
     * @throws \Exception
     */
    public function getClient(): HttpClient
    {
        return $this->client ?? new HttpClient($this->publicKey, $this->clientOptions);
    }

    /**
     * @param int $agendaUid
     *  The agenda UID.
     * @return string
     *   Response body as json.
     * @throws OpenAgendaSdkException
     *
     * @link https://developers.openagenda.com/configuration-dun-agenda/
     */
    public function getAgenda(int $agendaUid): string
    {
        $content = $this->getClient()->request(Endpoints::AGENDA, ['agendaUid' => $agendaUid]);

        return $content;
    }

    /**
     * @param int $agendaUid
     *  The agenda UID.
     * @param array|null $params
     *   Urls query parameters such as search, sort, filters.
     * @return string
     *   Response body as json.
     * @throws OpenAgendaSdkException
     *
     * @link https://developers.openagenda.com/10-lecture/
     */
    public function getEvents(int $agendaUid, ?array $params = []): string
    {
        $content = $this->getClient()->request(Endpoints::EVENTS, ['agendaUid' => $agendaUid], $params + ['includeLabels' => 1, 'detailed' => 1]);

        return $content;
    }

    /**
     * @param int $agendaUid
     *  The agenda UID.
     * @param int $eventUid
     *   The event UID.
     * @return string
     *   Response body as json.
     * @throws OpenAgendaSdkException
     *
     * @link https://developers.openagenda.com/10-lecture/#lire-un-v-nement
     */
    public function getEvent(int $agendaUid, int $eventUid): string
    {
        $content = $this->getClient()->request(Endpoints::EVENT, ['agendaUid' => $agendaUid, 'eventUid' => $eventUid, 'includeLabels' => 1], ['includeLabels' => 1, 'detailed' => 1]);

        return $content;
    }
}
