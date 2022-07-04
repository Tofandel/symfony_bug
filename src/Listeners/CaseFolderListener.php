<?php

namespace App\Listeners;

use App\Entity\CaseFolder;

class CaseFolderListener
{

    public function postPersist(CaseFolder $changed): void
    {
        dump('persist');
        dump($changed);
    }

    public function postRemove(CaseFolder $caseFolder): void {
        dump('remove');
        dump($caseFolder);
    }

    public function postUpdate(CaseFolder $changed): void
    {
        dump('update');
        dump($changed);
    }
}