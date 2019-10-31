<?php
namespace App\Model;

use Symfony\Component\HttpClient\HttpClient;

class ApiManager {

    public function createQuery(string $url)
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'http://hackathon-wild-hackoween.herokuapp.com/' . $url);
        $statusCode = $response->getStatusCode();
        $contentType = $response->getHeaders()['content-type'][0];
        $content = $response->getContent();
        $content = $response->toArray();
        return $content;
    }

    public function getAllMovies()
    {
        $getMovies = $this->createQuery('movies');
        return $getMovies;
    }

    public function getAllMoviesById(string $id)
    {
        $getMoviesById = $this->createQuery('movies/' . $id);
        return $getMoviesById;
    }

    public function getAllMonsters()
    {
        $getMonsters = $this->createQuery('monsters');
        var_dump($getMonsters);
        return $getMonsters;
    }

    public function getAllMonstersById(string $id)
    {
        $getMonstersById = $this->createQuery('monsters/' . $id);
        return $getMonstersById;
    }
}
