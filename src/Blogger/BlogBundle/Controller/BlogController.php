<?php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\RedirectResponse
;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template
;

use JMS\SecurityExtraBundle\Annotation\Secure
;

use Blogger\BlogBundle\Entity\Blog,
    Blogger\BlogBundle\Form\BlogType
;

/**
 * Blog controller.
 */
class BlogController extends Controller
{
    /**
     * Edit a blog entry
     * @Route("/{id}/{slug}/edit", requirements={"id" = "\d+"}, name="BloggerBlogBundle_blog_edit")
     * @Method("get")
     * @Secure(roles="ROLE_BLOGGER")
     */
    public function editAction($id, $slug)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($id);
        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }
        $editForm = $this->createForm(new BlogType(), $blog);
        return $this->render('BloggerBlogBundle:Blog:edit.html.twig', array(
            'blog' => $blog,
            'form' => $editForm->createView(), 
        ));
    }
    
    /**
     * New blog entry -- Display a form for a new blog entry.
     * @Route("/new", name="BloggerBlogBundle_blog_new")
     * @Method("get")
     * @Secure(roles="ROLE_BLOGGER")
     */
     public function newAction()
     {
        $blog = new Blog();
        $form = $this->createForm(new BlogType(), $blog);
        return $this->render('BloggerBlogBundle:Blog:new.html.twig', array(
            'blog' => $blog,
            'form' => $form->createView(),
        ));
     }
     
     /** 
      * Create a new blog entry.
      * @Route("/create", name="BloggerBlogBundle_blog_create")
      * @Method("post")
      * @Secure(roles="ROLE_BLOGGER")
      */
    public function createAction()
    {
        $blog = new Blog();
        $form = $this->createForm(new BlogType(), $blog);
        $form->bindRequest($this->getRequest());
        if ($form->isValid()) {
            $post->setAuthor($this->get('security.context')->getToken()->getUser());
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($blog);
            $em->flush();
            $this->get('session')->setFlash('notice', 'Blog Saved');
            return $this->redirect($this->generateUrl('BloggerBlogBundle_blog_show', array(
                'id' => $blog->getId(), 
                'slug' => $blog->getSlug(),
            )));
        }
        return $this->render('BloggerBlogBundle:Blog:new.html.twig', array(
            'id'   => $blog->getId(),
            'slug' => $blog->getSlug(),
        ));
        
    }
 
    /**
     * Update and existing blog.
     * @Route("/{id}/{slug}/update", requirements={"id" = "\d+"}, name="BloggerBlogBundle_blog_update")
     * @Method("post")
     * @Secure(roles="ROLE_BLOGGER")
     */
    public function updateAction($id, $slug)
    {
        $em   = $this->getDoctrine()->getEntityManager();
        $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($id);
        if (!$blog) {
            throw $this->createNotFoundException('Unable to find blog');
        } 
        $editForm = $this->createForm(new BlogType(), $blog);
        $editForm->bindRequest($this->getRequest());
        if ($editForm->isValid()) {
            $em->persist($blog);
            $em->flush();
            $this->get('session')->setFlash('notice', 'Post Updated');
            return $this->redirect($this->generateUrl('BloggerBlogBundle_blog_show', array(
                'id' => $blog->getId(),
                'slug' => $blog->getSlug(),
            )));
        }
        return $this->render('BloggerBlogBundle:Blog:edit.html.twig', array(
            'id' => $blog->getId(),
            'slug' => $blog->getSlug(),
        ));
    }
    
    /**
     * Show a blog entry
     * @Route("/{id}/{slug}", requirements={"id" = "\d+"}, name="BloggerBlogBundle_blog_show")
     * @Method("get")
     */
    public function showAction($id, $slug)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }
        
        $comments = $em->getRepository('BloggerBlogBundle:Comment')
                       ->getCommentsForBlog($blog->getId());
        
        return $this->render('BloggerBlogBundle:Blog:show.html.twig', array(
            'blog'      => $blog,
            'comments'  => $comments
        ));
    }
}
