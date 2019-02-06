<?php declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * @ORM\Entity()
 * @ORM\Table(name="entities_a")
 */
class EntityA
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer")
     *
     * @var int|null
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=1000)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var EntityB|null
     *
     * @ORM\OneToOne(targetEntity="App\Entity\EntityB", cascade={"all"})
     * @ORM\JoinColumn(name="entity_b_id")
     *
     * Enable validation for nested entities
     * @Assert\Valid()
     */
    private $entityB;


    /**
     * @return int|null
     */
    public function getId () : ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName () : ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName (?string $name) : void
    {
        $this->name = $name;
    }

    /**
     * @return EntityB|null
     */
    public function getEntityB () : ?EntityB
    {
        return $this->entityB;
    }

    /**
     * @param EntityB|null $entityB
     */
    public function setEntityB (?EntityB $entityB) : void
    {
        $this->entityB = $entityB;
    }

    /**
     * @Assert\Callback()
     *
     * @param ExecutionContextInterface $executionContext
     */
    public function validateSomethingImportant (ExecutionContextInterface $executionContext) : void
    {
        dump("EntityA called with validation group: " . $executionContext->getGroup());

        // do some advanced validation logic based on the validation groups
        // ...
    }
}
