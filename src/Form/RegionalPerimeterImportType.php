<?php


namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ImportType
 * @package App\Form
 */
class RegionalPerimeterImportType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('year', ChoiceType::class, [
                'label' => 'Année',
                'choices' => $this->getYears(2000),

            ])
            ->add('regional_perimeter', FileType::class, [
                'label' => 'Périmètre régional',
            ])
            ->add('insee_siren', FileType::class, [
                'label' => 'Insee - Siren',
            ])
            ->add('cities', FileType::class, [
                'label' => 'Communes',
            ])
            ->add('new_cities', FileType::class, [
                'label' => 'Communes nouvelles',
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Importer',
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     * @return OptionsResolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        return $resolver->setDefaults([
            'data_class' => null,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'insee';
    }

    /**
     * @param $min
     * @param string $max
     * @return array
     */
    private function getYears($min, $max = 'current')
    {
        $years = range($min, ($max === 'current' ? date('Y') : $max));

        return array_combine($years, $years);
    }
}
