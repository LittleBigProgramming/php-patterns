<?php

class Youtube
{
    public function getVideoViewCount($id)
    {
        return 5000;
    }
}

interface YouTubeAdapterInterface
{
    public function getViews($id);
}

class YouTubeAdapter implements YouTubeAdapterInterface
{
    protected $client;

    public function __construct(Youtube $client)
    {
        $this->client = $client;
    }

    public function getViews($id)
    {
        return $this->client->getVideoViewCount($id);
    }
}

$youtube = new YouTubeAdapter(new YouTube);
echo $youtube->getViews('abc');