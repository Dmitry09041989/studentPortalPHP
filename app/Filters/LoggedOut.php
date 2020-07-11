<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class LoggedOut implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        // Do something here
        $uri = service('uri');

        if(!session()->get('isLoggedIn')&&$uri->getSegment(1) == 'portal')
        {

            return redirect()->to('/login');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}