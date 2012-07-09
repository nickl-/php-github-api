<?php

namespace Github\Tests\Functional;

use Github\Client;

class GistTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldRetrieveGistsListByUser()
    {
        $username = 'KnpLabs';

        $github = new Client();
        $gists = $github->getGistApi()->getList($username);
        $gist = array_pop($gists);

        $this->assertArrayHasKey('url', $gist);        
        $this->assertArrayHasKey('files', $gist);        
        $this->assertArrayHasKey('comments', $gist);        
        $this->assertArrayHasKey('created_at', $gist);        
        $this->assertArrayHasKey('updated_at', $gist);        
        $this->assertArrayHasKey('user', $gist);        
        $this->assertEquals('KnpLabs', $gist['user']['login']);        
    }
    
    /**
     * @test
     */
    public function shouldRetrieveGistById()
    {
        $id = 1;

        $github = new Client();
        $gist = $github->getGistApi()->getGist($id);

        $this->assertArrayHasKey('url', $gist);        
        $this->assertArrayHasKey('files', $gist);        
        $this->assertArrayHasKey('comments', $gist);        
        $this->assertArrayHasKey('created_at', $gist);        
        $this->assertArrayHasKey('updated_at', $gist);        
        $this->assertArrayHasKey('user', $gist);        
        $this->assertArrayHasKey('gistfile1.txt', $gist['files']);        
        $this->assertEquals('schacon', $gist['user']['login']);        
    }    
}
