<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 */

namespace Smakota\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class PanelController
 *
 * @package Smakota\Bundle\AdminBundle\Controller
 */
class PanelController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('SmakotaAdminBundle:Panel:index.html.twig');
    }
}