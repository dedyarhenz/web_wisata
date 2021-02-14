<?php namespace App\Filters;
 
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
 
class LoginFilter implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        if (!session('USERNAME'))
        {
            return redirect()->to('/admin/login');
        }
    }
 
    //--------------------------------------------------------------------
 
    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}