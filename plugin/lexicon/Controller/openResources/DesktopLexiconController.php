<?php

/*
 * This file is part of the Claroline Connect package.
 *
 * (c) Claroline Consortium <consortium@claroline.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Claroline\LexiconBundle\Controller\openResources;


use Claroline\CoreBundle\Entity\Group;
use Claroline\CoreBundle\Entity\User;
use Claroline\CoreBundle\Entity\Workspace\Workspace;
use Claroline\CoreBundle\Library\Security\Utilities;
use Claroline\CoreBundle\Manager\GroupManager;
use Claroline\CoreBundle\Manager\MailManager;
use Claroline\CoreBundle\Manager\UserManager;
use Claroline\CoreBundle\Manager\WorkspaceManager;
use Claroline\CoreBundle\Pager\PagerFactory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as EXT;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;


class DesktopLexiconController extends Controller
{
    
    /**
     * @EXT\Route(
     *     "/content/{nameResource}/{lang}",
     *     name="lexicon_content",
     *     requirements={
     *        "nameResource" : "[\w]+",
     *        "lang" : "[\w]+"
     *     }
     * )
     * @EXT\Method("GET")
     * @EXT\Template("ClarolineLexiconBundle:Pages:home.html.twig")
     */
    
    public function indexContent($nameResource, $lang)
    {
        //echo($nameResource);
        $user         = $this->container->get('claroline_lexicon.manager.users')->getCurrentUser();
        $data_content = $this->container->get('claroline_lexicon.manager.dictionaries')->getContentResource($nameResource, $lang, 'GREATER_THAN OR EQUAL');
        $date_json    = json_decode($data_content);
        $resourceName = (string) $date_json->idname;
        return $this->render('ClarolineLexiconBundle:Pages:content-resource.html.twig', array('data' => $data_content, 'active_user' => $user, 'resourceName' => $resourceName));
    }

}
