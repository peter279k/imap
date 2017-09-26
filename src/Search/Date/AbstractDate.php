<?php

declare(strict_types=1);

namespace Ddeboer\Imap\Search\Date;

use DateTimeInterface;
use Ddeboer\Imap\Search\AbstractCondition;

/**
 * Represents a date condition.
 */
abstract class AbstractDate extends AbstractCondition
{
    /**
     * Format for dates to be sent to the IMAP server.
     *
     * @var string
     */
    private $dateFormat;

    /**
     * The date to be used for the condition.
     *
     * @var DateTimeInterface
     */
    private $date;

    /**
     * Constructor.
     *
     * @param DateTimeInterface $date optional date for the condition
     */
    public function __construct(DateTimeInterface $date, string $dateFormat = 'd-m-Y')
    {
        $this->date = $date;
        $this->dateFormat = $dateFormat;
    }

    /**
     * Converts the condition to a string that can be sent to the IMAP server.
     *
     * @return string
     */
    final public function toString(): string
    {
        return sprintf('%s "%s"', $this->getKeyword(), $this->date->format($this->dateFormat));
    }
}
