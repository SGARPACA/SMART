<?php


namespace App\Handler\ImportModel;

use App\Entity\ImportModel;
use App\Handler\AbstractHandler;
use App\Manager\ImportModelManager;
use App\Repository\ImportLogRepository;
use AthomeSolution\ImportBundle\Entity\Config;
use AthomeSolution\ImportBundle\Manager\ConfigManager;
use Symfony\Component\Form\FormInterface;

/**
 * Class DeleteImportModelHandler
 * @package App\Handler
 */
class DeleteImportModelHandler extends AbstractHandler
{
    /**
     * @var ConfigManager
     */
    private $configManager;
    /**
     * @var ImportModelManager
     */
    private $importModelManager;
    /**
     * @var ImportLogRepository
     */
    private $importLogRepository;

    /**
     * DeleteImportModelHandler constructor.
     * @param ConfigManager $configManager
     * @param ImportLogRepository $importLogRepository
     * @param ImportModelManager $importModelManager
     */
    public function __construct(
        ConfigManager $configManager,
        ImportLogRepository $importLogRepository,
        ImportModelManager $importModelManager
    ) {
        $this->configManager = $configManager;
        $this->importLogRepository = $importLogRepository;
        $this->importModelManager = $importModelManager;
    }

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form)
    {

        if (!$this->validate($form)) {
            return false;
        }
        /** @var ImportModel $importModel */
        $importModel = $form->getData();

        $this->importModelManager->removeEntity($importModel);

        return true;
    }

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function validate(FormInterface $form): bool
    {
        /** @var ImportModel $importModel */
        $importModel = $form->getData();
        if (!$importModel instanceof ImportModel) {
            return false;
        }

        if (!empty($this->importLogRepository->getByImportModel($importModel))) {
            return false;
        }

        return true;
    }
}
