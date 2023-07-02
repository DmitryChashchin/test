<?php
// src/Entity/Task.php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class Task
{
    protected $task;
    protected $dueDate;

    private $disable_lol_rule = false;

    public function getTask(): string
    {
        return $this->task;
    }

    public function setTask(string $task): void
    {
        $this->task = $task;
    }

    public function getDueDate(): ?\DateTime
    {
        return $this->dueDate;
    }

    public function setDueDate(?\DateTime $dueDate): void
    {
        $this->dueDate = $dueDate;
    }

    public function isDisableLolRule(): bool
    {
        return $this->disable_lol_rule;
    }

    public function setDisableLolRule(bool $disable_lol_rule): self
    {
        $this->disable_lol_rule = $disable_lol_rule;

        return $this;
    }

    /**
     * @Assert\Callback
     */
    public function validateTask(ExecutionContextInterface $context, $payload)
    {
        // Check if the task property is the word "lol"
        if (strtolower($this->task) === 'lol') {
            // Add the validation error
            $violation = $context->buildViolation('Task cannot be "lol"')
                ->atPath('task');

            // Check if the disable_lol_rule checkbox is not checked
            if (!$this->disable_lol_rule) {
                $violation->addViolation();
            } else {
                // Add a parameter to the violation to indicate that the "lol" rule was disabled
                $violation->setParameter('{{ disabled_rule }}', 'lol')->addViolation();
            }
        }
    }

}