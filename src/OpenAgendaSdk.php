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
     * OpenAgendaSDK constructor.
     *
     * @param string $publicKey
     *  OpenAgenda API publicKey.
     * @param array|null $clientOptions
     *  HttpClient options.
     * @throws \Exception
     *
     * @see \OpenAgendaSdk\RequestOptions for a list of available client options.
     */
    public function __construct(string $publicKey, ?array $clientOptions = [])
    {
        $this->client = new HttpClient($publicKey, $clientOptions);
    }

    /**
     * @return HttpClient
     */
    public function getClient(): HttpClient
    {
        return $this->client;
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
        $content = $this->client->request(Endpoints::AGENDA, ['agendaUid' => $agendaUid]);

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
        $content = $this->client->request(Endpoints::EVENTS, ['agendaUid' => $agendaUid], $params + ['includeLabels' => 1, 'detailed' => 1]);

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
        $content = $this->client->request(Endpoints::EVENT, ['agendaUid' => $agendaUid, 'eventUid' => $eventUid, 'includeLabels' => 1], ['includeLabels' => 1, 'detailed' => 1]);

        return $content;
    }
}
