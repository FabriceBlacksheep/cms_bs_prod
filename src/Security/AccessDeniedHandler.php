<?php
namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Authorization\AccessDeniedHandlerInterface;

class AccessDeniedHandler implements AccessDeniedHandlerInterface
{
    public function handle(Request $request, AccessDeniedException $accessDeniedException): ?Response
    {
        // ...
        $content = $this->twig->render('security/access_denied.html.twig', [
            'current_menu' => 'access_denied',
        ]);

        return new Response($content, 403);
    }
}