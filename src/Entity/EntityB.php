<?php declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * @ORM\Entity()
 * @ORM\Table(name="entities_b")
 */
class EntityB
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
     * @ORM\Column(name="field_a", type="string", length=1000)
     * @Assert\NotBlank()
     */
    private $fieldA;

    /**
     * @var string|null
     *
     * @ORM\Column(name="field_b", type="string", length=1000, nullable=true)
     * @Assert\NotBlank(groups={"required_field_b"})
     */
    private $fieldB;


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
    public function getFieldA () : ?string
    {
        return $this->fieldA;
    }

    /**
     * @param string|null $fieldA
     */
    public function setFieldA (?string $fieldA) : void
    {
        $this->fieldA = $fieldA;
    }

    /**
     * @return string|null
     */
    public function getFieldB () : ?string
    {
        return $this->fieldB;
    }

    /**
     * @param string|null $fieldB
     */
    public function setFieldB (?string $fieldB) : void
    {
        $this->fieldB = $fieldB;
    }


    /**
     * @Assert\Callback()
     *
     * @param ExecutionContextInterface $executionContext
     */
    public function validateRequiredFields (ExecutionContextInterface $executionContext) : void
    {
        dump("EntityB called with validation group: " . $executionContext->getGroup());

        // do some advanced validation logic based on the validation groups
        // ...
    }
}
