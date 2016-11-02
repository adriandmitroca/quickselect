<?php

namespace AdrianDmitroca\QuickSelect;

class QuickSelect
{

    /**
     * @var array
     */
    private $numbers;

    /**
     * @var Partition
     */
    private $partition;

    /**
     * @var int
     */
    private $pivotIndex = 0;

    /**
     * QuickSelect constructor.
     *
     * @param array $numbers
     */
    public function __construct(array $numbers)
    {
        $this->numbers   = $numbers;
        $this->partition = new Partition($numbers);
    }

    /**
     * Find the kth smallest element in an unordered list
     *
     * @param int $k
     * @param int $left
     * @param int $right
     *
     * @return int
     */
    public function select(int $k, int $left = 0, int $right = null) : int
    {
        $right = $right === null ? count($this->numbers) - 1 : $right;

        if ($left === $right) {
            return $this->numbers[$left];
        }

        $this->numbers    = $this->partition->partition($left, $right);
        $this->pivotIndex = $this->partition->getPivotIndex();

        if ($k === $this->pivotIndex) {
            return $this->numbers[$this->pivotIndex];
        }

        if ($k < $this->pivotIndex) {
            return $this->select($k, $left, $this->pivotIndex - 1);
        }

        return $this->select($k, $this->pivotIndex + 1, $right);
    }
}