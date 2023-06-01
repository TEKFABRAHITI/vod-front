<?php
namespace App\Controller;
use App\Repository\VideoRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
class VideoController extends AbstractController
{
    #[Route('/video', name: 'app_front_video')]
    public function index(VideoRepository $videoRepository): Response
    {
        $videos = $videoRepository->findAll();
        return $this->render('video/index.html.twig', [
            'videos' =>$videos,
        ]);
    }
    #[Route('/video/{slug}', name: 'app_video_show')]
    public function showBook($slug, VideoRepository $videoRepository): Response
    {
        //Jn récupère le video correspondant au slug
        $video = $videoRepository->findOneBy(['slug' => $slug]);
        // On rend la page en lui passant le video
        return $this->render('video/show.html.twig', [
            'video' =>$video,
        ]);}
}