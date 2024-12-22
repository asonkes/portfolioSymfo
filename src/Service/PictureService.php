<?php

namespace App\Service;

use Exception;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PictureService
{
    private $params;

    public function __construct(ParameterBagInterface $params)
    {
        $this->params = $params;
    }

    // UploadedFile ==> cela permet de pouvoir télécharger une image (paramètre obligatoire)
    // ?string $folder ==> dossier dans lequel on peut mettre l'image (paramètre optionnel, c'est pour cela qu'il y a '?')
    // ?int $width = 250 ==> on met un entier qui sera la largeur de l'image que l'on veut stocker (paramètre optionnel, c'est pour cela qu'il y a '?')
    // ?int $height = 250 ==> on met un entier qui sera la heuteur de l'image que l'on veut stocker (paramètre optionnel, c'est pour cela qu'il y a '?')
    public function add(UploadedFile $picture, ?string $folder = '')
    {
        // On donne un nouveau nom à l'image et on transforme l'image en 'webp' (nécessaire pour éviter les conflits entre certaines images qui ont le même nom)
        $fichier = md5(uniqid(rand(), true)) . 'webp';

        // On récupère les infos de l'image (infos de hauteur, largeur de mon image)
        $picture_infos = getimagesize($picture);

        // Ici, $picture_infos === false, cela veut dire qu'il y aura eu un 'false' dans le 'getimagesize'
        if ($picture_infos === false) {
            throw new Exception("Format d'image incorrect");
        }

        // On vérifie le format de l'image (jpeg, png ou webp)
        switch ($picture_infos['mime']) {
            case 'image/png':
                $picture_source = imagecreatefrompng($picture);
                break;
            case 'image/jpeg':
                $picture_source = imagecreatefromjpeg($picture);
                break;
            case 'image/webp':
                $picture_source = imagecreatefromwebp($picture);
                break;
            default:
                throw new Exception("Format d'image incorrect");
        }

        $path = $this->params->get('images_directory') . $folder;

        // On créé le dossier de destination s'il n'existe pas
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        // Sauvegarder l'image en webp
        imagewebp($picture_source, $path . '/' . $fichier);

        imagedestroy($picture_source);

        return $fichier;
    }

    public function delete(string $fichier, ?string $folder = ''): bool
    {

        if ($fichier !== 'default.webp') {
            $success = false;
            $path = $this->params->get('images_directory') . $folder;

            $original = $path . '/' . $fichier;

            if (file_exists($original)) {
                unlink($original);
                $success = true;
            }

            return $success;
        }

        return false;
    }
}
